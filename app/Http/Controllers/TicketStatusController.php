<?php

namespace App\Http\Controllers;

use App\TicketStatus;
use Illuminate\Http\Request;

class TicketStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = TicketStatus::all();
        return view('ticketstatuses.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticketstatuses.create');
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

        TicketStatus::create($data);
        return redirect()->route('ticketstatuses.index')
            ->with(["type"=>"success","msg"=>"Ticket Status added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TicketStatus $ticketStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticketStatus = TicketStatus::find($id);
        return view('ticketstatuses.edit',compact('ticketStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $ticketStatus = TicketStatus::find($id);
        $ticketStatus->update($data);
        return redirect()->route('ticketstatuses.index')
            ->with(["type"=>"success","msg"=>"Ticket Status updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TicketStatus  $ticketStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketStatus = TicketStatus::find($id);
        $ticketStatus->delete();
        return redirect()->route('ticketstatuses.index')
            ->with(["type"=>"danger","msg"=>"Ticket Status deleted successfully"]);
    }
}
