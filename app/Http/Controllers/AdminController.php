<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\chats;
use App\Models\homestays;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.index');
    }

    public function bookings()
    {
        $bookings = Booking::withTrashed()->latest()->get();

        return view('Admin.bookings',compact('bookings'));
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
        $booking = new Booking;
        $booking->homestay_id = $request->input('homestay_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_description = $request->input('booking_description');
        $booking->booking_total_price = $request->input('homestay_price');
        $booking->booking_status = 'Confirmed';
        $booking->created_by = $request->input('created_by');
        $booking->updated_by = $request->input('created_by');
        $booking->created_at = Carbon::now();
        $booking->updated_at = Carbon::now();
        $booking->save();

        return redirect('bookinglist')->with('success', 'Booking has been Saved!');
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
        $booking = Booking::findOrFail($id);
        $booking->homestay_id = $request->input('homestay_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_description = $request->input('booking_description');
        $booking->booking_total_price = $request->input('homestay_price');
        $booking->booking_status = 'Confirmed';
        $booking->created_by = $request->input('created_by');
        $booking->updated_by = $request->input('created_by');
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

    

}
