<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CheckIn;
use App\Models\ScoreHistory;
use App\Models\QuitDate;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total count for users, check-ins, and quit dates
        $totalUsers = User::count();
        $totalCheckIns = CheckIn::count();
        $totalScoreHistories = ScoreHistory::count();
    
        // Total number of users who have quit smoking (active quit date)
        $totalQuitUsers = QuitDate::where('is_active', true)->count();
    
        // Example of monthly check-ins for graph
        $checkInsPerMonth = CheckIn::selectRaw("MONTH(date) as month, COUNT(*) as total")
            ->groupBy('month')
            ->pluck('total', 'month');
    
        return view('Admin.dashboard', compact('totalUsers', 'totalCheckIns', 'totalScoreHistories', 'totalQuitUsers', 'checkInsPerMonth'));
    }
}




