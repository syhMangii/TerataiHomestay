<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckIn;
use App\Models\ScoreHistory;
use App\Models\Action;
use App\Models\QuitDate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
//     public function create()
// {
//     $userId = auth()->id();
//     $today = \Carbon\Carbon::today();

//     // Check if the user has checked in today
//     $hasCheckedInToday = CheckIn::where('user_id', $userId)
//         ->whereDate('date', $today)
//         ->exists();

//     // Get the last 7 days of check-ins for the user
//     $last7Days = collect();
//     for ($i = 6; $i >= 0; $i--) {
//         $date = $today->copy()->subDays($i);
//         $checkIn = CheckIn::where('user_id', $userId)
//             ->whereDate('date', $date)
//             ->first();

//         $last7Days->push([
//             'date' => $date->toDateString(),
//             'status' => $checkIn ? $checkIn->action_id : null,
//         ]);
//     }

//     // Calculate the max streak (consecutive "smoke" or "not smoke" days)
//     $maxStreak = 0;
//     $currentStreak = 0;
//     foreach ($last7Days as $day) {
//         if ($day['status'] === 222 || $day['status'] === 111) {
//             $currentStreak++;
//             $maxStreak = max($maxStreak, $currentStreak);
//         } else {
//             $currentStreak = 0;
//         }
//     }

//     // Calculate the week count (total streaks divided by 7)
//     $weekCount = floor(ScoreHistory::where('user_id', $userId)->sum('streak_score') / 7);

//     // Calculate daily, streak, and total scores
//     $dailyScore = ScoreHistory::where('user_id', $userId)->sum('check_in_score');
//     $streakScore = ScoreHistory::where('user_id', $userId)->sum('streak_score');
//     $totalScore = $dailyScore + $streakScore;

//     $activeQuitDate = QuitDate::where('user_id', auth()->id())
//     ->where('is_active', true)
//     ->latest('quit_date')
//     ->first();

// $lastInactiveQuitDate = QuitDate::where('user_id', auth()->id())
//     ->where('is_active', false)
//     ->latest('quit_date')
//     ->first();

//     return view('checkin.create', compact(
//         'hasCheckedInToday',
//         'last7Days',
//         'dailyScore',
//         'streakScore',
//         'totalScore',
//         'weekCount',
//         'maxStreak',
//         'activeQuitDate', 
//         'lastInactiveQuitDate'
//     ));
// }

//create working
//  public function create()
// {
//     $user = Auth::user();
//     $today = Carbon::today();
//     $yesterday = $today->copy()->subDay();

//     // Alert if > 2 weeks and not read
//     $showFlipchartAlert = false;
//     if (!$user->is_read && $user->created_at->diffInDays(now()) >= 14) {
//         $showFlipchartAlert = true;
//     }

//     // Today’s check-in
//     $todayCheckIn = CheckIn::whereDate('created_at', $today)
//         ->whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
//         ->first();

//     $hasCheckedInToday = $todayCheckIn !== null;

//     //ni masalah
//     // === STREAK CONTINUITY VALIDATION ===
//     // Check if yesterday's check-in exists and is 'Not smoke'
//     // $yesterdayCheckIn = CheckIn::whereDate('created_at', $yesterday)
//     //     ->where('action', 'not smoke')
//     //     ->where('is_continous', true)
//     //     ->whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
//     //     ->first();

//     // // If no valid 'not smoke' from yesterday, break continuity
//     // if (!$yesterdayCheckIn) {
//     //     CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
//     //         ->latest('created_at')
//     //         ->first()?->update(['is_continous' => false]);
//     // }

//     // === SCORE CALCULATIONS ===
//     $checkinScore = CheckIn::whereHas('scoreHistory', fn($q) => 
//         $q->where('user_id', $user->id))
//         ->with('scoreHistory')
//         ->get()
//         ->sum(fn($checkIn) => $checkIn->scoreHistory->score ?? 0);

//     $streakScore = Streak::whereHas('scoreHistory', fn($q) => 
//         $q->where('user_id', $user->id))
//         ->with('scoreHistory')
//         ->get()
//         ->sum(fn($streak) => $streak->scoreHistory->score ?? 0);

//     $latestStreak = Streak::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
//         ->latest()
//         ->first();

//     $streakCount = $latestStreak?->streak_count ?? 0;

//     $totalScore = ScoreHistory::where('user_id', $user->id)->sum('score');

//     $quitDate = QuitDate::where('user_id', $user->id)->latest()->first();
//     $activeQuitDate = QuitDate::where('user_id', $user->id)->where('is_active', true)->exists();

//     // === WAVE LOGIC ===
//     $wavePartition = 0;

//     $checkIns = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
//         ->orderBy('created_at')
//         ->get();

//     if ($checkIns->isNotEmpty()) {
//         $latestCheckIn = $checkIns->last();

//         if (strtolower($latestCheckIn->action) === 'not smoke') {
//             $continuousCheckIns = $checkIns->where('action', 'not smoke')
//                 ->where('is_continous', true)
//                 ->count();

//             $wavePartition = $continuousCheckIns > 0 ? ($continuousCheckIns % 7 ?: 7) : 0;
//         }
//     }

//     // Circular wave logic
//     $shiftSteps = [
//         0 => -56, 1 => -62, 2 => -68, 3 => -74,
//         4 => -80, 5 => -86, 6 => -92, 7 => -98,
//     ];

//     $circularWaveShift = $shiftSteps[$wavePartition];

//     return view('checkin.create', compact(
//         'checkinScore',
//         'streakScore',
//         'totalScore',
//         'quitDate',
//         'wavePartition',
//         'circularWaveShift',
//         'hasCheckedInToday',
//         'streakCount',
//         'activeQuitDate',
//         'showFlipchartAlert'
//     ));
// }

 public function create()
{
    return view('checkin.create');

}

    // Store check-in and calculate score
    public function store(Request $request)
{
    $request->validate([
        'action_id' => 'required|in:111,222',
    ]);

    $userId = Auth::id();
    $today = now()->toDateString();

    $existing = CheckIn::where('user_id', $userId)
        ->where('date', $today)
        ->first();

    if ($existing) {
        return response()->json(['message' => 'Already checked in today.'], 400);
    }

    // Store Check-In
    $checkIn = CheckIn::create([
        'user_id' => $userId,
        'action_id' => $request->action_id,
        'date' => $today,
    ]);

    $checkInScore = $request->action_id == 222 ? 2 : 0;

    // Check for 7-day streak
    $isStreak = true;
    for ($i = 1; $i <= 6; $i++) {
        $date = now()->subDays($i)->toDateString();
        $hasCheckIn = checkIn::where('user_id', $userId)->whereDate('date', $date)->exists();
        if (!$hasCheckIn) {
            $isStreak = false;
            break;
        }
    }

    $streakScore = $isStreak ? 10 : 0;

    ScoreHistory::create([
        'user_id' => $userId,
        'check_in_id' => $checkIn->check_in_id,
        'check_in_score' => $checkInScore,
        'streak_score' => $streakScore,
        'date_recorded' => $today,
    ]);

    return response()->json(['message' => 'Check-in recorded successfully.']);
}

public function badge()
{
    return view('checkin.badges');
}

public function aboutus()
{
    return view('checkin.aboutus');
}

public function flipchart()
{
    return view('checkin.flipchart');
}
}
