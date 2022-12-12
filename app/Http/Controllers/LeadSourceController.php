<?php

namespace App\Http\Controllers;

use App\LeadSource;
use Illuminate\Http\Request;

class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = LeadSource::all();
        return view('lead-source.index',compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lead-source.create');
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
            'name' => 'required'
        ]);

        LeadSource::create($data);
        return redirect()->route('lead-sources.index')
            ->with(['type'=>'success', 'msg'=>'Lead Source added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function show(LeadSource $leadSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadSource $leadSource)
    {
        return view('lead-source.edit',compact('leadSource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadSource $leadSource)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);

        $leadSource->update($data);
        return redirect()->route('lead-sources.index')
            ->with(['type'=>'success', 'msg'=>'Lead Source update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeadSource $leadSource)
    { 
        $leadSource->delete();
        return redirect()->route('lead-sources.index')
            ->with(['type'=>'success', 'msg'=>'Lead Source deleted successfully']);
    }
}
