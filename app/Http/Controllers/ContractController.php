<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractType;
use App\User;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ContractType::all();
        $contracts = Contract::all();
        return view("contracts.index",compact('contracts','types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ContractType::all();
        $customers = User::all();
        return view("contracts.create",compact('types','customers'));
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
            'contract_type' => 'required',
            'customer_id' => 'required',
            'contract_value' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
        ]);

        Contract::create($data);
        return redirect()->route('contracts.index')
            ->with(['type'=>'success', 'msg'=>'Contract added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view("contracts.show",compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $types = ContractType::all();
        $customers = User::all();
        return view("contracts.edit",compact('contract','types','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $data = $request->validate([
            'name' => 'required',
            'contract_type' => 'required',
            'customer_id' => 'required',
            'contract_value' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
        ]);

        $contract->update($data);
        return redirect()->route('contracts.index')
            ->with(['type'=>'success', 'msg'=>'Contract updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')
            ->with(['type'=>'danger', 'msg'=>'Contract deleted successfully']);
    }
}
