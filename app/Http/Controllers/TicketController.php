<?php

namespace App\Http\Controllers;

use App\Project;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        return view('tickets.create',compact('users','projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'department_id' => 'required',
            'assigned_to' => 'required',
            'ticket_status_id' => 'required',
            'ticket_priority_id' => 'required',
        ]);

        $tag_id = ($request->has('tag_id')) ? implode(',',$request->tag_id) : "" ;

        $data = array(

            'created_by' => auth()->user()->id,
            'subject' => $request->subject,
            'customer_contact_id' => $request->customer_contact_id,
            'department_id' => $request->department_id,
            'email_cc' => $request->email_cc,
            'tag_id' => $tag_id,
            'assigned_to' => $request->assigned_to,
            'ticket_status_id' => $request->ticket_status_id,
            'ticket_priority_id' => $request->ticket_priority_id,
            'ticket_service_id' => $request->ticket_service_id,
            'project_id' => $request->project_id,
            'pre_defined_replies_id' => $request->pre_defined_replies_id,
            'details' => $request->details,
        );

        Ticket::create($data);

        return redirect()->route('tickets.index')
            ->with(["type"=>"success","msg"=>"Ticket added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $users = User::all();
        $projects = Project::all();
        return view('tickets.edit',compact('ticket','users','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'subject' => 'required',
            'department_id' => 'required',
            'assigned_to' => 'required',
            'ticket_status_id' => 'required',
            'ticket_priority_id' => 'required',
        ]);

        $tag_id = ($request->has('tag_id')) ? implode(',',$request->tag_id) : "" ;

        $data = array(

            'created_by' => auth()->user()->id,
            'subject' => $request->subject,
            'customer_contact_id' => $request->customer_contact_id,
            'department_id' => $request->department_id,
            'email_cc' => $request->email_cc,
            'tag_id' => $tag_id,
            'assigned_to' => $request->assigned_to,
            'ticket_status_id' => $request->ticket_status_id,
            'ticket_priority_id' => $request->ticket_priority_id,
            'ticket_service_id' => $request->ticket_service_id,
            'project_id' => $request->project_id,
            'pre_defined_replies_id' => $request->pre_defined_replies_id,
            'details' => $request->details,
        );

        $ticket->update($data);
        return redirect()->route('tickets.index')
        ->with(["type"=>"success","msg"=>"Ticket updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')
            ->with(['type'=>'danger', 'msg'=>'Ticket deleted successfully']);
    }
}
