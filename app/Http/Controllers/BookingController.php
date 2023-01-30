<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bookings = Booking::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return view('booking.index',compact('bookings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingSchedule(Request $request)
    {
        $bookings = Booking::where('user_id', auth()->id())->orderBy('id', 'desc')->get();
        return view('booking.schedule',compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'from' => 'date_format:H:i',
            'to' => 'date_format:H:i|after:from',
        ]);
    
        Booking::create($request->all() + ['user_id' => auth()->id()]);
    
        return redirect()->route('booking.index')
            ->with(["type"=>"success","msg"=>"Booking added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
      
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'from_date' => 'required',
            'to_date' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]);

        $booking->update($request->all());
    
        return redirect()->route('booking.index')
            ->with(["type"=>"success","msg"=>"Booking updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('booking.index')
            ->with(["type"=>"danger","msg"=>"Booking deleted successfully"]);
    }
}
