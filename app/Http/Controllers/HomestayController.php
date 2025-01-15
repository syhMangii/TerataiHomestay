<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\homestays;
use Carbon\Carbon;

class HomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homestays = homestays::where('created_by',auth()->user()->id)->latest()->get();

        return view('Admin.homestays',compact('homestays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $homestays = new homestays;
        $homestays->homestay_name = $request->input('homestay_name');
        $homestays->homestay_price = $request->input('homestay_price');
        $homestays->homestay_details = $request->input('homestay_details');
        $homestays->created_by = auth()->user()->id;
        $homestays->updated_by = auth()->user()->id;
        $homestays->created_at = Carbon::now();
        $homestays->updated_at = Carbon::now();
        $homestays->save();

        return redirect('homestays')->with('success', 'Package has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homestays = homestays::findOrFail($id);

        return view('Admin.show',compact('homestays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homestays = homestays::findOrFail($id);

        return view('Admin.edit',compact('homestays'));
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
        $homestays = homestays::findOrFail($id);
        $homestays->homestay_name = $request->input('homestay_name');
        $homestays->homestay_price = $request->input('homestay_price');
        $homestays->homestay_details = $request->input('homestay_details');
        $homestays->updated_by = auth()->user()->id;
        $homestays->updated_at = Carbon::now();
        $homestays->save();

        return redirect('homestays')->with('success', 'Homestay has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homestays = homestays::findOrFail($id);
        $homestays->delete();

        return redirect('homestays')->with('success', 'Homestay has been deleted!');
    }
}
