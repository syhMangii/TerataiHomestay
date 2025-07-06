<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckIn;
use App\Models\User;
use App\Models\School;
use App\Models\Clinic;
use App\Models\ScoreHistory;
use App\Models\QuitDate;
use App\Models\Streak;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // Show Add User Form
    public function addUserForm()
    {
        $clinicId = auth()->user()->clinic_id;

        // Admin only sees schools under their clinic_id
        $schools = School::where('clinic_id', $clinicId)->get();

        return view('Admin.add-user', compact('schools'));
    }


    // Save User
    public function saveUser(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            // 'phone' => 'nullable|string|max:20',
            'age' => 'nullable|integer|min:0',
            'class_name' => 'nullable|string|max:255',
            'school_id' => 'required|exists:schools,id',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        // $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        // $user->phone = $request->phone;
        $user->age = $request->age;
        $user->class_name = $request->class_name;
        $user->school_id = $request->school_id;

        // Clinic ID will be null
        $user->clinic_id = null;

        $user->role = 'User';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.patients')->with('success', 'Patient registered successfully!');
    }

   public function indexPatients(Request $request)
{
    $clinicId = Auth::user()->clinic_id;

    $query = User::where('role', '!=', 'admin')
        ->whereHas('school', function ($q) use ($clinicId) {
            $q->where('clinic_id', $clinicId);
        })
        ->with('school');

    // Filter by school if selected
    if ($request->filled('school')) {
        $query->whereHas('school', function ($q) use ($request) {
            $q->where('name', $request->school);
        });
    }

    // Sort by created_at
    $sort = $request->input('sort', 'desc'); // default to latest
    $query->orderBy('created_at', $sort);

    $users = $query->get();

    // Get school list for filter dropdown
    $schools = School::where('clinic_id', $clinicId)->get();

    return view('Admin.manage-patients', compact('users', 'schools', 'sort'));
}

    
    // public function viewCheckins($id)
    // {
    //     $user = User::findOrFail($id);
    //     $checkins = CheckIn::where('user_id', $id)->orderByDesc('date')->get();
    
    //     return view('Admin.checkins', compact('user', 'checkins'));
    // }

    public function userDetails($userId)
{
    $user = User::with('school', 'clinic')->findOrFail($userId);

    // Get all score histories for this user
    $scoreHistories = ScoreHistory::where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();

    // Get all check-ins via score_histories
    $checkIns = CheckIn::whereIn('score_history_id', $scoreHistories->pluck('id'))
        ->orderBy('created_at', 'desc')
        ->get();

    // Get all streaks via score_histories
    $streaks = Streak::whereIn('score_history_id', $scoreHistories->pluck('id'))
        ->orderBy('created_at', 'desc')
        ->get();

    // Calculate accumulated score
    $totalScore = $scoreHistories->sum('score');

    // Get latest active quit date
    $quitDate = QuitDate::where('user_id', $userId)
        ->where('is_active', true)
        ->orderBy('quit_date', 'desc')
        ->first();

    return view('Admin.user-details', compact(
        'user',
        'scoreHistories',
        'checkIns',
        'streaks',
        'totalScore',
        'quitDate'
    ));
}


    
    // Edit Check-In
    public function editCheckin($checkinId)
    {
        $checkIn = CheckIn::findOrFail($checkinId);
        return view('Admin.edit_checkin', compact('checkIn'));
    }

    // Update Check-In
    public function updateCheckin(Request $request, $checkinId)
    {
        $checkIn = \App\Models\CheckIn::findOrFail($checkinId);

        $request->validate([
            'action' => 'required|string|max:255',
            'is_continous' => 'required|boolean',
        ]);

        $checkIn->action = $request->action;
        $checkIn->is_continous = $request->is_continous;
        $checkIn->save();

        return redirect()->back()->with('success', 'Check-In updated successfully!');
    }
    
    // Delete Check-In
    public function deleteCheckin($checkinId)
    {
        $checkIn = \App\Models\CheckIn::findOrFail($checkinId);
        $checkIn->delete();

        return redirect()->back()->with('success', 'Check-In deleted successfully!');
    }

    // Edit Streak
    public function editStreak($streakId)
    {
        $streak = \App\Models\Streak::findOrFail($streakId);
        return view('Admin.edit_streak', compact('streak'));
    }

    // Update Streak
    public function updateStreak(Request $request, $streakId)
    {
        $streak = \App\Models\Streak::findOrFail($streakId);

        $request->validate([
            'streak_count' => 'required|integer|min:0',
        ]);

        $streak->streak_count = $request->streak_count;
        $streak->save();

        return redirect()->back()->with('success', 'Streak updated successfully!');
    }

    // Delete Streak
    public function deleteStreak($streakId)
    {
        $streak = \App\Models\Streak::findOrFail($streakId);
        $streak->delete();

        return redirect()->back()->with('success', 'Streak deleted successfully!');
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $schools = School::all();
        $clinics = Clinic::all();

        return view('Admin.editUser', compact('user', 'schools', 'clinics'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        // $user->phone = $request->phone;
        $user->school_id = $request->school_id;
        $user->clinic_id = $request->clinic_id; // This can stay if used in backend, else remove

        // Add new fields
        $user->age = $request->age;
        $user->class_name = $request->class_name;

        // Only update password if filled
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.editUser', $user->id)->with('success', 'User updated successfully!');
    }

    public function deleteUser($userId)
    {
        // Find the user
        $user = User::findOrFail($userId);

        // Optionally: you can add protection here (don’t allow deleting Admin users, for example)
        if ($user->role === 'Admin') {
            return redirect()->back()->with('error', 'Cannot delete an Admin user.');
        }

        // Delete the user
        $user->delete();

        // Redirect back with success message
        // return redirect()->route('admin.patientList')->with('success', 'User deleted successfully.');
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

}
