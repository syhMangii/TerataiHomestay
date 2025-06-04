<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BadgeController;

use Illuminate\Http\Request;
use App\Models\CheckIn;
use App\Models\ScoreHistory;
use App\Models\Badge;
use App\Models\Streak;
use App\Models\QuitDate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
 public function create()
{
    $user = Auth::user();
    $today = Carbon::today();
    $yesterday = $today->copy()->subDay();

    // Alert if > 2 weeks and not read
    $showFlipchartAlert = false;
    if (!$user->is_read && $user->created_at->diffInDays(now()) >= 14) {
        $showFlipchartAlert = true;
    }

    // Today’s check-in
    $todayCheckIn = CheckIn::whereDate('created_at', $today)
        ->whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
        ->first();

    $hasCheckedInToday = $todayCheckIn !== null;

    // === SCORE CALCULATIONS ===
    $checkinScore = CheckIn::whereHas('scoreHistory', fn($q) => 
        $q->where('user_id', $user->id))
        ->with('scoreHistory')
        ->get()
        ->sum(fn($checkIn) => $checkIn->scoreHistory->score ?? 0);

    $streakScore = Streak::whereHas('scoreHistory', fn($q) => 
        $q->where('user_id', $user->id))
        ->with('scoreHistory')
        ->get()
        ->sum(fn($streak) => $streak->scoreHistory->score ?? 0);

    $latestStreak = Streak::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
        ->latest()
        ->first();

    $streakCount = $latestStreak?->streak_count ?? 0;

    $totalScore = ScoreHistory::where('user_id', $user->id)->sum('score');

    $quitDate = QuitDate::where('user_id', $user->id)->latest()->first();
    $activeQuitDate = QuitDate::where('user_id', $user->id)->where('is_active', true)->exists();

    // === WAVE LOGIC ===
    $wavePartition = 0;

    $checkIns = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
    ->orderByDesc('created_at') // count from latest to oldest
    ->get();

    //count continous checkins
    if ($checkIns->isNotEmpty()) {
    $count = 0;

    foreach ($checkIns as $checkIn) {
        if (strtolower($checkIn->action) === 'not smoke') {
            if (!$checkIn->is_continous) {
                break; // stop counting if is_continous = 0 and action = 'not smoke'
            }
            $count++;
        } else {
            break; // stop if action is not 'not smoke'
        }
    }

    $wavePartition = $count > 0 ? ($count % 7 ?: 7) : 0;
}

    // Circular wave logic
    $shiftSteps = [
        0 => -56, 1 => -62, 2 => -68, 3 => -74,
        4 => -80, 5 => -86, 6 => -92, 7 => -98,
    ];

    $circularWaveShift = $shiftSteps[$wavePartition];

    // === Badge check ===
    $badgeController = new BadgeController();
    $newBadges = $badgeController->checkAndAwardBadges();

    return view('checkin.create', compact(
        'checkinScore',
        'streakScore',
        'totalScore',
        'quitDate',
        'wavePartition',
        'circularWaveShift',
        'hasCheckedInToday',
        'streakCount',
        'activeQuitDate',
        'showFlipchartAlert',
        'newBadges'
        ));
}

public function store(Request $request)
{
    $user = Auth::user();
    $action = strtolower($request->input('action')); // 'smoke' or 'not smoke'

    $now = Carbon::now();
    $today = $now->startOfDay();
    $yesterday = $now->copy()->subDay()->startOfDay();

    // Check if user already checked in today
    $alreadyCheckedIn = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
        ->whereDate('created_at', $today)
        ->exists();

    if ($alreadyCheckedIn) {
        return response()->json(['message' => 'Already checked in today.'], 200);
    }

    $isContinuous = false;

    $latestCheckIn = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
        ->latest('created_at')
        ->first();

    // === NOT SMOKE handling
    if ($action === 'not smoke') {
        $isContinuous = true;

        if ($latestCheckIn && strtolower($latestCheckIn->action) === 'not smoke') {
        $latestDate = $latestCheckIn->created_at->startOfDay();

        // If NOT yesterday = streak broken
        if (!$latestDate->eq($yesterday)) {
            // BREAK continuity of old record BEFORE creating new one
            $latestCheckIn->update(['is_continous' => false]);

            // Reset
            QuitDate::where('user_id', $user->id)
                ->where('is_active', true)
                ->latest('created_at')
                ->first()?->update(['is_active' => false]);

            $resetScore = ScoreHistory::create([
                'user_id' => $user->id,
                'score' => 0,
            ]);

            Streak::create([
                'score_history_id' => $resetScore->id,
                'streak_count' => 0,
            ]);

            // ✅ Create NEW fresh start CheckIn
            $scoreHistory = ScoreHistory::create([
                'user_id' => $user->id,
                'score' => 2,
            ]);
// Log::info('Creating new check-in after reset', [
//     'user_id' => $user->id,
//     'score_history_id' => $scoreHistory->id,
//     'action' => $action,
//     'is_continous' => true,
// ]);

            $newCheckIn = CheckIn::create([
                'score_history_id' => $scoreHistory->id,
                'action' => $action,
                'is_continous' => true, // fresh new start
            ]);
            Log::info('New CheckIn created', $newCheckIn->toArray());


    return response()->json(['message' => 'Check-in recorded successfully 2.']);
        }
    }

    // === Normal case: create new score and check-in
    $scoreHistory = ScoreHistory::create([
        'user_id' => $user->id,
        'score' => 2,
    ]);

    CheckIn::create([
        'score_history_id' => $scoreHistory->id,
        'action' => $action,
        'is_continous' => true,
    ]);
}


    // === SMOKE
    elseif ($action === 'smoke') {
        $isContinuous = false;

        if ($latestCheckIn && strtolower($latestCheckIn->action) === 'not smoke' && $latestCheckIn->is_continous) {
            $latestCheckIn->update(['is_continous' => false]);
        }

        QuitDate::where('user_id', $user->id)
            ->where('is_active', true)
            ->latest('created_at')
            ->first()?->update(['is_active' => false]);

        $scoreHistory = ScoreHistory::create([
            'user_id' => $user->id,
            'score' => 0,
        ]);

        Streak::create([
            'score_history_id' => $scoreHistory->id,
            'streak_count' => 0,
        ]);

        CheckIn::create([
            'score_history_id' => $scoreHistory->id,
            'action' => $action,
            'is_continous' => false,
        ]);
    }

    // === STREAK BONUS ===
    if ($action === 'not smoke' && $isContinuous) {
        $continuousCount = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
            ->where('action', 'not smoke')
            ->where('is_continous', true)
            ->count();

        if ($continuousCount % 7 === 0) {
            $streakCount = (int) floor($continuousCount / 7);

            Streak::create([
                'score_history_id' => $scoreHistory->id,
                'streak_count' => $streakCount,
            ]);

            ScoreHistory::create([
                'user_id' => $user->id,
                'score' => 2,
            ]);
        }
    }

    return response()->json(['message' => 'Check-in recorded successfully.']);
}

public function badges()
{
    $user = Auth::user();
    $badges = Badge::all(); // Get all badges

    return view('checkin.badges', [
        'badges' => $badges,
        'user' => $user,
    ]);
}

public function aboutus()
{
    return view('checkin.aboutus');
}

}
