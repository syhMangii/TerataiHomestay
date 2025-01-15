<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function indexadmin()
    {
        return view('Auth.login-admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $user = User::where('email',$request->input('email'))->where('role','User')->first();

        if($user != ''){

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                return redirect()->to('/homeusr');
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }

            

        }
        else{
            return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
        }
    }

    public function loginadmin(Request $request)
    {
        $user = User::where('email',$request->input('email'))->where('role','Admin')->first();

        if($user != ''){

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                return redirect()->to('/homestays');
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }

            

        }
        else{
            return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');

        //check unique
        $emailcheck = User::where('email',$email)->where('status','!=','R')->count();
        $usernamecheck = User::where('username',$username)->where('status','!=','R')->count();
     

        if($emailcheck > 0){
            return redirect()->back()->with('error', 'Email already exist');
        }
        else if($usernamecheck > 0){
            return redirect()->back()->with('error', 'Username Already Exist!');
        }
        else if($password != $cpassword){
            return redirect()->back()->with('error', 'Password does not match with confirm password!');
        }
        else{
            $user = new User;
            $user->email = $email;
            $user->username = $username;
            $user->name = $name;
            $user->phone = $phone;
            $user->password = Hash::make($password);
            $user->role = 'User';
            $user->status = 'A';
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect('/loginusr')->with('success', 'Register Success! Please login to your Account.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function register(Request $request)
    {
        return view('Auth.register');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function signout()
    {
        auth()->logout();
        return redirect('/');
    }
}
