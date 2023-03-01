<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Mail\SendEmailMarketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'from' => 'date_format:H:i',
            'to' => 'date_format:H:i|after:from',
            'meeting_link' => 'nullable',
            'invite_email' => 'nullable',
            'email_addresses' => 'nullable'
        ]);


        $data['user_id'] = auth()->id();
    
        Booking::create($data);

        if (!empty($request->input('meeting_link')) && !empty($request->input('email_addresses'))) {

            $multipleEmails = explode (",", $request->input('email_addresses')); 
            $details = [
                'type' => 'booking',
                'subject' => $request->input('title'),
                "content" => nl2br($request->input('invite_email'))
            ];
           
            foreach ($multipleEmails as $item) {
                $email = new SendEmailMarketing($details);
                Mail::to($item)->send($email); 

            }           
        }
        
        return redirect()->route('booking.index')
            ->with(["type"=>"success","msg"=>"Schedule Added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
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
            'to' => 'required',
            'meeting_link' => 'nullable',
            'invite_email' => 'nullable',
            'email_addresses' => 'nullable'
        ]);
        $data['user_id'] = auth()->id();

        $booking->update($data);
    
        return redirect()->route('booking.index')
            ->with(["type"=>"success","msg"=>"Schedule updated successfully"]);
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
            ->with(["type"=>"danger","msg"=>"Schedule deleted successfully"]);
    }
}
