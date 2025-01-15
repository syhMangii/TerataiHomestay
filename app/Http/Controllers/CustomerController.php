<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\chats;
use App\Models\homestays;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;

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
        $booking = new Booking;
        $booking->homestay_id = $request->input('homestay_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_description = $request->input('booking_description');
        $booking->booking_total_price = $request->input('homestay_price');
        $booking->booking_status = 'Confirmed';
        $booking->created_by = auth()->user()->id;
        $booking->updated_by = auth()->user()->id;
        $booking->created_at = Carbon::now();
        $booking->updated_at = Carbon::now();
        $booking->save();

        return redirect('homeusr')->with('success', 'Booking has been confirmed!');
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
        $booking = Booking::findOrFail($id);
        $booking->homestay_id = $request->input('homestay_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->booking_description = $request->input('booking_description');
        $booking->booking_total_price = $request->input('homestay_price');
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

        $usernamecheck = User::where('username',$username)->where('status','!=','R')->count();

        if($usernamecheck > 0 && $customer->username != $username){
            return redirect()->back()->with('error', 'Username Already Exist!');
        }
        else{
            $customer->username = $username;
            $customer->name = $name;
            $customer->phone = $phone;
            $customer->updated_at = Carbon::now();
            $customer->save();

            return redirect('/profile')->with('success', 'Profile has been Successfully Updated!');
    }
}

}
