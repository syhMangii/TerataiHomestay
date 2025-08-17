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

        // Get all check-ins for streak calculation
        $allCheckIns = CheckIn::whereHas('scoreHistory', fn($q) => $q->where('user_id', $user->id))
            ->orderByDesc('created_at')
            ->get();

        // Count continuous check-ins
        $continuousStreakCount = 0;
        if ($allCheckIns->isNotEmpty()) {
            $count = 0;
            foreach ($allCheckIns as $checkIn) {
                if (strtolower($checkIn->action) === 'not smoke') {
                    if (!$checkIn->is_continous) {
                        break; 
                    }
                    $count++;
                } else {
                    break;
                }
            }
            $continuousStreakCount = $count;
        }

        $streakInWeeks = floor($continuousStreakCount / 7);

        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();

        $checkInsThisMonth = $allCheckIns->filter(function ($checkIn) use ($startOfMonth, $endOfMonth) {
            return $checkIn->created_at->between($startOfMonth, $endOfMonth);
        });

        $totalActivities = $checkInsThisMonth->count();

        $checkInsByDay = $checkInsThisMonth->keyBy(function ($item) {
            return $item->created_at->format('j');
        });

        $monthName = $today->format('F');
        $year = $today->year;
        $daysInMonth = $today->daysInMonth;
        $firstDayOfMonth = $startOfMonth->dayOfWeekIso; // 1 (Mon) - 7 (Sun)

        $todayCheckIn = $allCheckIns->first(function ($checkIn) use ($today) {
            return $checkIn->created_at->isSameDay($today);
        });

        $hasCheckedInToday = $todayCheckIn !== null;

        return view('checkin.streak', compact(
            'streakInWeeks',
            'totalActivities',
            'checkInsByDay',
            'monthName',
            'year',
            'daysInMonth',
            'firstDayOfMonth',
            'continuousStreakCount',
            'hasCheckedInToday'
        ));
    }
}