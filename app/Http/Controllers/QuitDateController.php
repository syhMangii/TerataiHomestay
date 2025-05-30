<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuitDate;

class QuitDateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'quit_date' => 'required|date',
        ]);

        $user = Auth::user();

        // Deactivate current active quit date
        QuitDate::where('user_id', $user->id)
            ->where('is_active', true)
            ->update(['is_active' => false]);

        // Create new quit date
        QuitDate::create([
            'user_id' => $user->id,
            'quit_date' => $request->quit_date,
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Quit date has been set successfully.');
    }
}
