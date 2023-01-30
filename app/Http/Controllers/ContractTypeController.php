<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ContractType::all();
        return view("contractType.index",compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contractType.create");
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
            'name' => 'required|unique:contract_types,name',
            'description' => 'nullable',
        ]);

        ContractType::create($data);
        return redirect()->route('contract-types.index')
            ->with(['type'=>'success', 'msg'=>'Contract Type added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function show(ContractType $contractType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function edit(ContractType $contractType)
    {
        return view("contractType.edit",compact('contractType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contractType)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);        

        $contractType->update($data);
        return redirect()->route('contract-types.index')
            ->with(['type'=>'success', 'msg'=>'Contract Type updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContractType  $contractType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contractType)
    {
        $contractType->delete();
        return redirect()->route('contract-types.index')
            ->with(['type'=>'danger', 'msg'=>'Contract Type deleted successfully']);
    }
}
