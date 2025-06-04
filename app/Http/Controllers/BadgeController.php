<?php

namespace App\Http\Controllers;
use App\Models\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    public function collection()
{
    $user = Auth::user();
    $badges = Badge::all(); // Get all badges

    return view('checkin.collection', [
        'badges' => $badges,
        'user' => $user,
    ]);
}
public function checkAndAwardBadges()
{
    $user = Auth::user();
    $earnedBadgeIds = $user->badges->pluck('id')->toArray();
    $eligibleBadges = Badge::whereNotIn('id', $earnedBadgeIds)->get();

    $checkIns = $user->checkIns()
        ->where('action', 'not smoke')
        ->orderByDesc('created_at')
        ->get();

    $checkInCount = 0;
    foreach ($checkIns as $checkIn) {
        if ($checkIn->is_continous) {
            $checkInCount++;
        } else {
            break;
        }
    }

    $latestStreak = $user->streaks()->latest()->first();
    $streakCount = $latestStreak?->streak_count ?? 0;
    $firstLoginDate = $user->created_at->startOfDay();
    $daysSinceFirstLogin = now()->startOfDay()->diffInDays($firstLoginDate);
    $quitDate = $user->quitDates()->latest()->first();

    $newlyAwardedBadges = [];

    foreach ($eligibleBadges as $badge) {
        $award = false;

        switch ($badge->type) {
            case 'check_in':
                $award = $checkInCount >= $badge->requirement;
                break;
            case 'streak':
                $award = $streakCount >= $badge->requirement;
                break;
            case 'login':
                $award = true;
                break;
            case 'login_duration':
                $award = $daysSinceFirstLogin >= $badge->requirement;
                break;
            case 'quit_date_set':
                $award = $user->quitDates()->where('is_active', true)->exists();
                break;
            case 'active_on_quit_date':
                if ($quitDate && $quitDate->is_active) {
                    $award = $user->checkIns()
                        ->whereDate('check_ins.created_at', $quitDate->quit_date)
                        ->where('action', 'not smoke')
                        ->where('is_continous', true)
                        ->exists();
                }
                break;
        }

        if ($award) {
            $user->badges()->attach($badge->id, ['achieved_at' => now()]);
            $newlyAwardedBadges[] = $badge;
        }
    }

    if (!empty($newlyAwardedBadges)) {
        session()->flash('new_badges', $newlyAwardedBadges);
    }
}

}
