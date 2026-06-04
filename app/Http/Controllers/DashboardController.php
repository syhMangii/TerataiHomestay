<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $clinicId = Auth::user()->clinic_id;
        $schoolIds = School::where('clinic_id', $clinicId)->pluck('id');
        $userIds   = User::whereIn('school_id', $schoolIds)->where('role', '!=', 'admin')->pluck('id');

        $totalUsers = $userIds->count();

        $totalQuitUsers = DB::table('badge_user')
            ->where('badge_id', 4)
            ->whereIn('user_id', $userIds)
            ->count();

        $schools = School::where('clinic_id', $clinicId)
            ->withCount(['users' => fn($q) => $q->where('role', '!=', 'admin')])
            ->get();

        foreach ($schools as $school) {
            $schoolUserIds = User::where('school_id', $school->id)
                ->where('role', '!=', 'admin')
                ->pluck('id');
            $school->quit_count = DB::table('badge_user')
                ->where('badge_id', 4)
                ->whereIn('user_id', $schoolUserIds)
                ->count();
        }

        $clinicName = Auth::user()->clinic->name ?? 'Admin';

        return view('Admin.dashboard', compact(
            'clinicName',
            'totalUsers',
            'totalQuitUsers',
            'schools'
        ));
    }

    public function schoolPatients(School $school)
    {
        // Ensure this school belongs to the logged-in admin's clinic
        abort_if($school->clinic_id !== Auth::user()->clinic_id, 403);

        $users = User::where('school_id', $school->id)
            ->where('role', '!=', 'admin')
            ->get();

        $quitUserIds = DB::table('badge_user')
            ->where('badge_id', 4)
            ->whereIn('user_id', $users->pluck('id'))
            ->pluck('user_id')
            ->flip()
            ->toArray();

        $lastCheckin = DB::table('check_ins')
            ->join('score_histories', 'check_ins.score_history_id', '=', 'score_histories.id')
            ->whereIn('score_histories.user_id', $users->pluck('id'))
            ->select('score_histories.user_id', DB::raw('MAX(check_ins.created_at) as last_at'))
            ->groupBy('score_histories.user_id')
            ->pluck('last_at', 'score_histories.user_id');

        $smokeFreeDays = DB::table('check_ins')
            ->join('score_histories', 'check_ins.score_history_id', '=', 'score_histories.id')
            ->whereIn('score_histories.user_id', $users->pluck('id'))
            ->where('check_ins.action', 'not smoke')
            ->select('score_histories.user_id', DB::raw('COUNT(*) as days'))
            ->groupBy('score_histories.user_id')
            ->pluck('days', 'score_histories.user_id');

        $enrolledCount = $users->count();
        $quitCount     = count($quitUserIds);
        $activeCount   = $enrolledCount - $quitCount;
        $rate          = $enrolledCount > 0 ? round(($quitCount / $enrolledCount) * 100) : 0;

        return response()->json([
            'school' => [
                'id'       => $school->id,
                'name'     => $school->name,
                'enrolled' => $enrolledCount,
                'quit'     => $quitCount,
                'active'   => $activeCount,
                'rate'     => $rate,
            ],
            'users' => $users->map(function ($user, $i) use ($quitUserIds, $lastCheckin, $smokeFreeDays) {
                $isQuit   = array_key_exists($user->id, $quitUserIds);
                $colors   = ['orange', 'teal', 'gray'];
                return [
                    'id'          => $user->id,
                    'username'    => $user->username,
                    'class_name'  => $user->class_name,
                    'age'         => $user->age,
                    'initials'    => strtoupper(substr($user->username, 0, 2)),
                    'status'      => $isQuit ? 'quit' : 'active',
                    'color'       => $isQuit ? 'orange' : $colors[$i % 3],
                    'smoke_free'  => $smokeFreeDays->get($user->id, 0),
                    'last_checkin'=> $lastCheckin->get($user->id)
                        ? \Carbon\Carbon::parse($lastCheckin->get($user->id))->format('Y-m-d')
                        : null,
                    'detail_url'  => route('admin.userDetails', $user->id),
                ];
            })->values(),
        ]);
    }
}
