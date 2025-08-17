<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CheckIn;
use App\Models\Streak;
use Carbon\Carbon;

class StreakController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();

        $latestStreak = Streak::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
            ->latest()
            ->first();

        $streakInDays = $latestStreak?->streak_count ?? 0;
        $streakInWeeks = floor($streakInDays / 7);

        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        $checkIns = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();

        $totalActivities = $checkIns->count();

        $checkInsByDay = $checkIns->keyBy(function ($item) {
            return $item->created_at->format('j');
        });

        $monthName = $today->format('F');
        $year = $today->year;
        $daysInMonth = $today->daysInMonth;
        $firstDayOfMonth = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)

        return view('checkin.streak', compact(
            'streakInWeeks',
            'totalActivities',
            'checkInsByDay',
            'monthName',
            'year',
            'daysInMonth',
            'firstDayOfMonth',
            'streakInDays'
        ));
    }
}