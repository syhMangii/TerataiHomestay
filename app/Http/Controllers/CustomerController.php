<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\chats;
use App\Models\homestays;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash; 


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::withTrashed()->where('created_by',auth()->user()->id)->latest()->get();

        return view('Customer.index',compact('bookings'));
    }

    public function custsupport(Request $request) {

        $id = User::where('role','Admin')->first()->id;

        $contacts = User::select('*')
        ->where('role','admin')
        ->get();

        if($id != NULL){    
            $ct = User::select('*')
            ->where('role','admin')
            ->where('id',$id)
            ->first();

            $chats = chats::where('admin_id',$id)->where('customer_id',auth()->user()->id)->get();
        }
        else{
            $chats = [];
            $ct = [];
        }

        return view('Customer.mysupport',compact('contacts','chats','ct','id'));
    }


    public function replyCustomer($id,Request $request){

        $chat = new chats();
        $chat->message = $request->input('message');
        $chat->customer_id = auth()->user()->id;
        $chat->admin_id = $id;
        $chat->sent_by = auth()->user()->id;
        $chat->chat_created = Carbon::now();
        $chat->first = 'N';
        $chat->save();
        
        return redirect()->back();
    }

    public function create()
    {
        $homestays = homestays::latest()->get();

        return view('Customer.create',compact('homestays'));
    }

    

    public function packagelist()
    {
        $homestays = homestays::latest()->get();

        return view('Customer.package',compact('homestays'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Dump the request input values to check what's being sent
    // dd($request->all());

    try {
        // Validate inputs
        $validatedData = $request->validate([
            'homestay_id' => 'required|exists:homestays,id',
            'booking_check_in_date' => 'required|date',
            'booking_check_out_date' => 'required|date|after:booking_check_in_date',
            'booking_guest_number' => 'required|integer|min:1|max:10',
            'booking_is_bbq' => 'required|boolean',
            'homestay_price' => 'required|numeric|min:0',
            'booking_receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Receipt is optional but must be valid
        ]);

        // Calculate booking duration
        $checkInDate = Carbon::parse($validatedData['booking_check_in_date']);
        $checkOutDate = Carbon::parse($validatedData['booking_check_out_date']);
        $nights = $checkInDate->diffInDays($checkOutDate);

        // Calculate total price
        $totalPrice = $nights * $validatedData['homestay_price'];

        // Handle file upload if receipt is provided
        $receiptPath = null;
        if ($request->hasFile('booking_receipt')) {
            $receiptPath = $request->file('booking_receipt')->store('receipts', 'public');
        }

        // Create booking
        $booking = new Booking;
        $booking->homestay_id = $validatedData['homestay_id'];
        $booking->booking_check_in_date = $validatedData['booking_check_in_date'];
        $booking->booking_check_out_date = $validatedData['booking_check_out_date'];
        $booking->booking_guest_number = $validatedData['booking_guest_number'];
        $booking->booking_is_bbq = $validatedData['booking_is_bbq'];
        $booking->booking_total_price = $totalPrice;
        $booking->booking_status = 'Confirmed';
        $booking->created_by = auth()->user()->id;
        $booking->updated_by = auth()->user()->id;
        $booking->created_at = Carbon::now();
        $booking->updated_at = Carbon::now();
        $booking->booking_receipt = $receiptPath; // Save the receipt file path
        $booking->save();

        return redirect('homeusr')->with('success', 'Booking has been confirmed!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // If validation fails, redirect back with input and error messages
        return redirect()->back()
            ->withErrors($e->validator)
            ->withInput();
    } catch (\Exception $e) {
        // Catch any other exceptions and handle them
        return redirect()->back()
            ->with('error', 'An error occurred while processing your booking. Please try again.')
            ->withInput();
    }
}





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        $homestays = homestays::latest()->get();

        return view('Customer.show',compact('booking','homestays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $homestays = homestays::latest()->get();

        return view('Customer.edit',compact('booking','homestays'));
    }

    public function profile()
    {
        return view('Customer.profile');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Validate inputs
    $validatedData = $request->validate([
        'homestay_id' => 'required|exists:homestays,id',
        'booking_check_in_date' => 'required|date',
        'booking_check_out_date' => 'required|date|after:booking_check_in_date',
        'booking_guest_number' => 'required|integer|min:1|max:10',
        'booking_is_bbq' => 'required|boolean',
        'homestay_price' => 'required|numeric|min:0',
        'booking_receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Receipt is optional but must be a valid file
    ]);

    // Retrieve the existing booking
    $booking = Booking::findOrFail($id);

    // Calculate booking duration
    $checkInDate = Carbon::parse($validatedData['booking_check_in_date']);
    $checkOutDate = Carbon::parse($validatedData['booking_check_out_date']);
    $nights = $checkInDate->diffInDays($checkOutDate);

    // Calculate total price
    $totalPrice = $nights * $validatedData['homestay_price'];

    // Handle file upload if receipt is provided
    if ($request->hasFile('booking_receipt')) {
        // Delete old receipt if exists
        if ($booking->booking_receipt && Storage::exists('public/' . $booking->booking_receipt)) {
            Storage::delete('public/' . $booking->booking_receipt);
        }

        // Store new receipt
        $receiptPath = $request->file('booking_receipt')->store('receipts', 'public');
        $booking->booking_receipt = $receiptPath;
    }

    // Update booking details
    $booking->homestay_id = $validatedData['homestay_id'];
    $booking->booking_check_in_date = $validatedData['booking_check_in_date'];
    $booking->booking_check_out_date = $validatedData['booking_check_out_date'];
    $booking->booking_guest_number = $validatedData['booking_guest_number'];
    $booking->booking_is_bbq = $validatedData['booking_is_bbq'];
    $booking->booking_total_price = $totalPrice;
    $booking->booking_status = 'Confirmed';
    $booking->updated_by = auth()->user()->id;
    $booking->updated_at = Carbon::now();
    $booking->save();

    return redirect('homeusr')->with('success', 'Booking has been updated!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::where('id',$id)->update([
            'deleted_at' => Carbon::now(),
            'booking_status' => 'Cancelled'
        ]);


        return redirect('homeusr')->with('success', 'Booking has been cancelled!');
    }


    public function updProfile(Request $request)
{
    $customer = User::findOrFail(auth()->user()->id);

    $name = $request->input('name');
    $username = $request->input('username');
    $phone = $request->input('phone');
    $current_password = $request->input('current_password');
    $new_password = $request->input('new_password');
    $confirm_password = $request->input('confirm_password');

    // Check if the username is already taken
    $usernamecheck = User::where('username', $username)
        ->where('status', '!=', 'R')
        ->count();

    if ($usernamecheck > 0 && $customer->username != $username) {
        return redirect()->back()->with('error', 'Username Already Exists!');
    }

    // Update name, username, and phone
    $customer->username = $username;
    $customer->name = $name;
    $customer->phone = $phone;

    // Update password if provided
    if (!empty($current_password) || !empty($new_password) || !empty($confirm_password)) {
        if (!empty($current_password)) {
            if (!Hash::check($current_password, $customer->password)) {
                return redirect()->back()->with('error', 'Current password is incorrect!');
            }

            if ($new_password !== $confirm_password) {
                return redirect()->back()->with('error', 'New password and confirmation password do not match!');
            }

            if (Hash::check($new_password, $customer->password)) {
                return redirect()->back()->with('error', 'New password cannot be the same as the current password!');
            }

            $customer->password = Hash::make($new_password);
        } else {
            return redirect()->back()->with('error', 'Please provide the current password to update the password.');
        }
    }

    $customer->updated_at = Carbon::now();
    $customer->save();

    return redirect('/profile')->with('success', 'Profile has been Successfully Updated!');
}



public function downloadReceipt($id)
{
    $booking = Booking::findOrFail($id);

    if ($booking->booking_receipt) {
        $filePath = 'public/' . $booking->booking_receipt;
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'Receipt not found!');
        }
    }

    return redirect()->back()->with('error', 'No receipt uploaded for this booking.');
}



}
