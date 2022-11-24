<?php

namespace App\Http\Controllers;

use App\PlanAttribute;
use Illuminate\Http\Request;

class PlanAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->plan_id) {
            return redirect()->route('plans.index');
        }
        
        $attributes = PlanAttribute::all();
        $plan_id = $request->plan_id;

        return view('plan_attributes.index',compact('attributes', 'plan_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $plan_id = $request->plan_id;
        return view('plan_attributes.create', compact('plan_id'));
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
            'plan_id' => 'required'
        ]);
    
        PlanAttribute::create($request->all() + ['included' => $request->included ?: 0]);
    
        return redirect()->route('plan_attributes.index', ['plan_id' => $request->plan_id])
            ->with(['type'=>'success', 'msg'=>'Plan Attribute added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlanAttribute  $planAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(PlanAttribute $planAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlanAttribute  $planAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $plan_id = $request->plan_id;
        $attribute = PlanAttribute::findOrFail($id);
        return view('plan_attributes.edit', compact('attribute', 'plan_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlanAttribute  $planAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $attribute = PlanAttribute::findOrFail($id);
        $attribute->update($request->all() + ['included' => $request->included ?? 0]);
    
        return redirect()->route('plan_attributes.index', ['plan_id' => $request->plan_id])
            ->with(['type'=>'success', 'msg'=>'Plan Attribute updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlanAttribute  $planAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attribute = PlanAttribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('plan_attributes.index', ['plan_id' => $request->plan_id])
            ->with(['type'=>'danger', 'msg'=>'Plan Attribute deleted successfully']);
    }
}
