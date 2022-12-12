<?php

namespace App\Http\Controllers;

use App\LeadStatus;
use Illuminate\Http\Request;

class LeadStatusController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = LeadStatus::all();
        return view('lead-statuses.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lead-statuses.create');
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
            'color' => 'required'
        ]);

        LeadStatus::create($data);
        return redirect()->route('lead-status.index')
            ->with(['type'=>'success', 'msg'=>'Lead Status added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeadStatus  $leadStatus
     * @return \Illuminate\Http\Response
     */
    public function show(LeadStatus $leadStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeadStatus  $leadStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadStatus $leadStatus)
    {
        return view('lead-statuses.edit',compact('leadStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeadStatus  $leadStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadStatus $leadStatus)
    {
        $data = $request->validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $leadStatus->update($data);
        return redirect()->route('lead-status.index')
            ->with(['type'=>'success', 'msg'=>'Lead Status update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeadStatus  $leadStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadStatus $leadStatus)
    {
        $leadStatus->delete();
        return redirect()->route('lead-status.index')
            ->with(['type'=>'success', 'msg'=>'Lead Status deleted successfully']);
    }
}
