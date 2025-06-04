<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CheckIn;
use App\Models\ScoreHistory;
use App\Models\QuitDate;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // Get the total count for users, check-ins, and quit dates
    //     $totalUsers = User::count();
    //     $totalCheckIns = CheckIn::count();
    //     $totalScoreHistories = ScoreHistory::count();
    
    //     // Total number of users who have quit smoking (active quit date)
    //     $totalQuitUsers = QuitDate::where('is_active', true)->count();
    
    //     // Example of monthly check-ins for graph
    //     $checkInsPerMonth = CheckIn::selectRaw("MONTH(date) as month, COUNT(*) as total")
    //         ->groupBy('month')
    //         ->pluck('total', 'month');
    
    //     return view('Admin.dashboard', compact('totalUsers', 'totalCheckIns', 'totalScoreHistories', 'totalQuitUsers', 'checkInsPerMonth'));
    // }

    public function index()
{
    $admin = Auth::user();
    $clinicId = $admin->clinic_id;

    // 1. Total Stats
    $totalUsers = User::where('clinic_id', $clinicId)->count();
    $totalCheckIns = CheckIn::whereIn('score_history_id', ScoreHistory::whereIn('user_id', User::where('clinic_id', $clinicId)->pluck('id'))->pluck('id'))->count();
    $totalScoreHistories = ScoreHistory::whereIn('user_id', User::where('clinic_id', $clinicId)->pluck('id'))->count();
    $totalQuitUsers = User::where('clinic_id', $clinicId)->where('is_read', true)->count(); // example condition for "quit"

    // 2. Check-Ins Per Month Chart
    $checkInsPerMonth = CheckIn::whereIn('score_history_id', ScoreHistory::whereIn('user_id', User::where('clinic_id', $clinicId)->pluck('id'))->pluck('id'))
        ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month');

    // 3. Number of Users per School
    $schools = School::where('clinic_id', $clinicId)
        ->withCount(['users' => function ($query) use ($clinicId) {
            $query->where('clinic_id', $clinicId);
        }])
        ->get();

    // 4. Streak Distribution
    $userIds = User::where('clinic_id', $clinicId)->pluck('id');
    $scoreHistoryIds = ScoreHistory::whereIn('user_id', $userIds)->pluck('id');
    $streakDistribution = Streak::whereIn('score_history_id', $scoreHistoryIds)
        ->selectRaw('streak_count, COUNT(*) as count')
        ->groupBy('streak_count')
        ->orderBy('streak_count')
        ->pluck('count', 'streak_count');

    return view('Admin.dashboard', compact(
        'totalUsers',
        'totalCheckIns',
        'totalScoreHistories',
        'totalQuitUsers',
        'checkInsPerMonth',
        'schools',
        'streakDistribution'
    ));
}
}




