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

//     public function index()
// {
//     $user = Auth::user();
//     $today = Carbon::today();

//     // --- Test Data for Scenario 1 ---
//     $continuousStreakCount = 4;
//     $streakInWeeks = 0; // Since it's less than 7 days
//     $totalActivities = 4; // Assuming these are the only activities this month
//     $hasCheckedInToday = true;

//     // Simulate check-ins for the last 4 days
//     $checkInsByDay = collect();
//     for ($i = 0; $i < 4; $i++) {
//         $date = $today->copy()->subDays($i);
//         // This is a simplified object for the view's purpose
//         $checkInsByDay[$date->day] = (object)['created_at' => $date];
//     }
//     // --- End of Test Data ---

//     $monthName = $today->format('F');
//     $year = $today->year;
//     $daysInMonth = $today->daysInMonth;
//     $firstDayOfMonth = $today->copy()->startOfMonth()->dayOfWeekIso;

//     return view('checkin.streak', compact(
//         'streakInWeeks',
//         'totalActivities',
//         'checkInsByDay',
//         'monthName',
//         'year',
//         'daysInMonth',
//         'firstDayOfMonth',
//         'continuousStreakCount',
//         'hasCheckedInToday'
//     ));
// }

// public function index()
//     {
//         $user = Auth::user();
//         $today = Carbon::today();

//         // --- Test Data for Scenario 2 ---
//         // Current continuous streak is 2 days (today and yesterday)
//         $continuousStreakCount = 2;
//         $streakInWeeks = 0;
//         // Total activities this month is 3 (one was before the break)
//         $totalActivities = 3;
//         $hasCheckedInToday = true;

//         // Simulate check-ins for today, yesterday, and 3 days ago
//         $checkInsByDay = collect();
//         // Day 4 (today)
//         $checkInsByDay[$today->day] = (object)['created_at' => $today];
//         // Day 3 (yesterday)
//         $checkInsByDay[$today->copy()->subDays(1)->day] = (object)['created_at' => $today->copy()->subDays(1)];
//         // Day 1 (3 days ago) - this was before the streak broke
//         $checkInsByDay[$today->copy()->subDays(3)->day] = (object)['created_at' => $today->copy()->subDays(3)];
//         // --- End of Test Data ---

//         $monthName = $today->format('F');
//         $year = $today->year;
//         $daysInMonth = $today->daysInMonth;
//         $firstDayOfMonth = $today->copy()->startOfMonth()->dayOfWeekIso;

//         return view('checkin.streak', compact(
//             'streakInWeeks',
//             'totalActivities',
//             'checkInsByDay',
//             'monthName',
//             'year',
//             'daysInMonth',
//             'firstDayOfMonth',
//             'continuousStreakCount',
//             'hasCheckedInToday'
//         ));
//     }

}