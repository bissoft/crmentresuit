<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index',compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = DB::table('lead_statuses')->get()->pluck('name','id');
        $sources = DB::table('lead_sources')->get()->pluck('name','id');
        $members = DB::table('users')->get()->pluck('name','id');
        return view('leads.create',compact('statuses','sources','members'));
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
            'source_id' => 'required',
            'company_name' => 'required',
            'position' => 'nullable',
            'status_id' => 'required',
            'estimate_budget' => 'required',
            'member_id' => 'required',
            'phone' => 'nullable',
            'website' => 'nullable',
            'country' => 'nullable',
            'description' => 'nullable'
        ]);
        Lead::create($data);
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('leads.show',compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $statuses = DB::table('lead_statuses')->get()->pluck('name','id');
        $sources = DB::table('lead_sources')->get()->pluck('name','id');
        $members = DB::table('users')->get()->pluck('name','id');
        return view('leads.edit',compact('lead','statuses','sources','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'name' => 'required',
            'source_id' => 'required',
            'company_name' => 'required',
            'position' => 'nullable',
            'status_id' => 'required',
            'estimate_budget' => 'required',
            'member_id' => 'required',
            'phone' => 'nullable',
            'website' => 'nullable',
            'country' => 'nullable',
            'description' => 'nullable'
        ]);
        $lead->update($data);
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead deleted successfully']);
    }
}
