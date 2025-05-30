<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\chats;
use App\Models\CheckIn;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPatients() {
        $users = User::where('role', '!=', 'admin')->get(); // Exclude admin if needed
        return view('Admin.manage-patients', compact('users'));
    }
    
    public function viewCheckins($id)
    {
        $user = User::findOrFail($id);
        $checkins = CheckIn::where('user_id', $id)->orderByDesc('date')->get();
    
        return view('Admin.checkins', compact('user', 'checkins'));
    }
    
    

    public function createBooking()
    {
        $homestays = homestays::latest()->get();
        $customers = User::where('role','User')->get();

        return view('Admin.create-booking',compact('homestays','customers'));
    }

    public function createCustomer()
    {

        return view('Admin.create-customer');
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            $booking->created_by = $request->input('created_by');
            $booking->updated_by = auth()->user()->id;
            $booking->created_at = Carbon::now();
            $booking->updated_at = Carbon::now();
            $booking->booking_receipt = $receiptPath; // Save the receipt file path
            $booking->save();
    
            return redirect('bookinglist')->with('success', 'Booking has been confirmed!');
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

    public function storeCustomer(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $phone = $request->input('phone');

        $emailcheck = User::where('email',$email)->where('status','!=','R')->count();
        $usernamecheck = User::where('username',$username)->where('status','!=','R')->count();
     

        if($emailcheck > 0){
            return redirect()->back()->with('error', 'Email already exist');
        }
        else if($usernamecheck > 0){
            return redirect()->back()->with('error', 'Username Already Exist!');
        }
        else{
            $user = new User;
            $user->email = $email;
            $user->username = $username;
            $user->name = $name;
            $user->phone = $phone;
            $user->password = Hash::make('P@ssw0rd');
            $user->role = 'User';
            $user->status = 'A';
            $user->updated_at = Carbon::now();
            $user->save();

            return redirect('/customers')->with('success', 'Customer Account has been Successfully Created!');
        }
    }



    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $homestays = homestays::latest()->get();
        $customers = User::where('role','User')->get();

        return view('Admin.edit-booking',compact('booking','homestays','customers'));
    }


    public function editCustomer($id)
    {
        $customer = User::findOrFail($id);

        return view('Admin.edit-customer',compact('customer'));
    }

    public function viewCustomer($id)
    {
        $customer = User::findOrFail($id);

        return view('Admin.show-customer',compact('customer'));
    }


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
    

        return redirect('bookinglist')->with('success', 'Booking has been updated!');
    }

    public function updateCustomer(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $name = $request->input('name');
        $email = $request->input('email');
        $username = $request->input('username');
        $phone = $request->input('phone');

        $emailcheck = User::where('email',$email)->where('status','!=','R')->count();
        $usernamecheck = User::where('username',$username)->where('status','!=','R')->count();
     

        if($emailcheck > 0 && $customer->email != $email){
            return redirect()->back()->with('error', 'Email already exist');
        }
        else if($usernamecheck > 0 && $customer->username != $username){
            return redirect()->back()->with('error', 'Username Already Exist!');
        }
        else{
            $customer->email = $email;
            $customer->username = $username;
            $customer->name = $name;
            $customer->phone = $phone;
            $customer->updated_at = Carbon::now();
            $customer->save();

            return redirect('/customers')->with('success', 'Customer Account has been Successfully Updated!');
    }
}

    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function bookinglist()
    {
        $bookings = Booking::withTrashed()->latest()->get();

        return view('Admin.booking',compact('bookings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function viewbookingadmin($id)
    {
    $booking = Booking::findOrFail($id);
    $homestays = homestays::latest()->get();
    $customers = User::where('role','User')->get();

    return view('Admin.viewbooking',compact('booking','homestays','customers'));
    }


    public function mysupportadmin(Request $request) {

        $id = $request->id ? : NULL;
        $contacts = chats::select('chats.customer_id','users.name','users.id')
        ->leftJoin('users','chats.customer_id','users.id')
        ->orderBy('chat_created')
        ->groupBy('chats.customer_id','users.name','users.id')
        ->get();

        if($id != NULL){        
            $chats = chats::where('customer_id',$id)->get();
        }
        else{
            $chats = [];
        }


        return view('Admin.mysupport',compact('contacts','chats'));
    }


    public function customers(Request $request) {
  
        $customers = User::where('role','User')->get();
    
        return view('Admin.customers',compact('customers'));
    }


    


    public function replyAdmin($id,Request $request){

        $chat = new chats();
        $chat->message = $request->input('message');
        $chat->customer_id = $id;
        $chat->admin_id = auth()->user()->id;
        $chat->sent_by = auth()->user()->id;
        $chat->chat_created = Carbon::now();
        $chat->first = 'N';
        $chat->save();
        return redirect()->back();
    }

    public function destroyCustomer($id)
    {
        User::where('id',$id)->delete();

        return redirect('customers')->with('success', 'Customer Account has been deleted!');
    }

    public function destroyBooking($id)
    {
        Booking::where('id',$id)->update([
            'deleted_at' => Carbon::now(),
            'booking_status' => 'Cancelled'
        ]);


        return redirect('/bookinglist')->with('success', 'Booking has been cancelled!');
    }
}
