<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FlipchartController extends Controller
{

public function flipchart()
{
    $user = auth()->user(); // Get currently logged-in user

    return view('checkin.flipchart', [
        'isRead' => $user->is_read,
    ]);
}

public function confirmRead()
{
    $user = Auth::user();
    $user->is_read = true;
    $user->save();

    return redirect()->back()->with('success', 'Your confirmation has been recorded.');
}

}
