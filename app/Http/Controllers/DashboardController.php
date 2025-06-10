<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\School;
use App\Models\Clinic;
use App\Models\CheckIn;
use App\Models\QuitDate;
use App\Models\ScoreHistory;
use App\Models\Streak;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
   $clinicId = Auth::user()->clinic_id;

    // Get school IDs that belong to this clinic
    $schoolIds = School::where('clinic_id', $clinicId)->pluck('id');

    // Get users who are connected to those schools
    $userIds = User::whereIn('school_id', $schoolIds)->pluck('id');

    // Count total users under those schools
    $totalUsers = $userIds->count();

    // Count users marked as "quit"
    $totalQuitUsers = DB::table('badge_user')
    ->where('badge_id', 4)
    ->whereIn('user_id', $userIds)
    ->count();

    // Get check-ins for those users via their score histories
    $checkInsPerDay = CheckIn::whereIn('score_history_id', function ($query) use ($userIds) {
            $query->select('id')
                ->from('score_histories')
                ->whereIn('user_id', $userIds);
        })
        ->selectRaw('DATE(created_at) as day,
            SUM(CASE WHEN action != "smoke" AND is_continous = 1 THEN 1 ELSE 0 END) as green_count,
            SUM(CASE WHEN action = "smoke" AND is_continous = 0 THEN 1 ELSE 0 END) as red_count')
        ->groupBy('day')
        ->orderBy('day')
        ->get();

    $checkInLabels = $checkInsPerDay->pluck('day');
    $greenCounts = $checkInsPerDay->pluck('green_count');
    $redCounts = $checkInsPerDay->pluck('red_count');

    // 3. Users per School (only schools from this clinic, and only users from this clinic)
    // Get school IDs under this clinic
    $schools = School::where('clinic_id', $clinicId)
        ->withCount(['users' => function ($query) use ($clinicId) {
            $query->whereHas('school', function ($schoolQuery) use ($clinicId) {
                $schoolQuery->where('clinic_id', $clinicId);
            });
        }])
        ->get();

        $clinic = Auth::user()->clinic; // Assuming `clinic()` relationship is defined in User model
        $clinicName = $clinic ? $clinic->name : 'Unknown Clinic';

    return view('Admin.dashboard', compact(
        'clinicName',
        'totalUsers',
        'totalQuitUsers',
        'schools',
        'checkInLabels',
        'greenCounts',
        'redCounts'
        ));
}

}




