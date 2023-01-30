<?php

namespace App\Http\Controllers;

use App\Plan;
use App\PlanAttribute;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('plans.index',compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plans.create');
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
            'name' => 'required|string|max:255',
            'price' => 'required',
            'type' => 'required|string|max:255',
            'stripe_plan_id' => 'required|string|max:255'
        ]);
    
        Plan::create($request->all());
    
        return redirect()->route('plans.index')
            ->with(['type'=>'success', 'msg'=>'Plan added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attributes = PlanAttribute::where('plan_id', $id)->get();
        $plan_id = $id;
        return view('plan_attributes.index', compact('attributes', 'plan_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'price' => 'required',
            'type' => 'required|string|max:255',
            'stripe_plan_id' => 'required|string|max:255'
        ]);
    
        $plan->update($request->all());
    
        return redirect()->route('plans.index')
            ->with(['type'=>'success', 'msg'=>'Plan updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')
            ->with(['type'=>'success', 'msg'=>'Plan deleted successfully']);
    }
}
