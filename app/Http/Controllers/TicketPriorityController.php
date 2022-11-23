<?php

namespace App\Http\Controllers;

use App\TicketPriority;
use Illuminate\Http\Request;

class TicketPriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = TicketPriority::all();
        return view('ticketpriorities.index',compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticketpriorities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        TicketPriority::create($data);
        return redirect()->route('ticketpriorities.index')
            ->with(["type"=>"success","msg"=>"Ticket Priorities added successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function show(TicketPriority $ticketPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketPriority = TicketPriority::find($id);
        return view('ticketpriorities.edit',compact('ticketPriority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $ticketPriority = TicketPriority::find($id);
        $ticketPriority->update($data);
        return redirect()->route('ticketpriorities.index')
            ->with(["type"=>"success","msg"=>"Ticket Priorities updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TicketPriority  $ticketPriority
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketPriority = TicketPriority::find($id);
        $ticketPriority->delete();
        return redirect()->route('ticketpriorities.index')
            ->with(["type"=>"danger","msg"=>"Ticket Priorities deleted successfully"]);
    }
}
