<?php

namespace App\Http\Controllers;

use App\Contract;
use App\ContractType;
use App\Lead;
use App\Mail\ContractEmail;
use App\Mail\SendEmailMarketing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $lead = Lead::with('status')->get();
       
        return view("contracts.create",compact('lead','types','customers'));
    }

    public function get_lead($id)
    {
        $lead = Lead::find($id);
        
        return response()->json($lead);
    }
    public function edit_lead($id)
    {
        $lead = Lead::find($id);
        
        return response()->json($lead);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable',
            'contract_type' => 'required',
            'customer_id' => 'required',
            'contract_value' => 'nullable',
            'email' => 'required',
            // 'start_date' => 'required|date',
            // 'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable',
        ]);
        $link = '';
        if($request->file('contract_docs')){
            $file= $request->file('contract_docs');
            $filename = 'contract-'.date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('files/documents/'), $filename);
           $data['contract_docs'] = $filename;
           $link = $filename;
        }
        Contract::create($data);
        $details = [
            'type' => 'contract',
            'subject' => request('contract_value') ?? 'Entresuite CRM',
            "content" =>  $link ?? '',
            "detail" =>  $request->description ?? '',
            'email' => request('email') ?? '',
        ];

        $email = new SendEmailMarketing($details);
        Mail::to($details['email'])->send($email); 
        
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
        $lead = Lead::with('status')->get();
        return view("contracts.edit",compact('lead','contract','types','customers'));
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
            'contract_value' => 'nullable',
            'email' => 'required',
            // 'start_date' => 'required|date',
            // 'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required',
        ]);
        $link = '';
        if($request->file('contract_docs')){
            $file= $request->file('contract_docs');
            $filename = 'contract-'.date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('files/documents/'), $filename);
        $data['contract_docs'] = $filename;
        $link =   $filename;
        }
     
        $contract->update($data);
        $details = [
            'type' => 'contract',
            'subject' => request('contract_value') ?? 'Entresuite CRM',
            "content" =>  $link ?? '',
            "detail" =>  $request->description ?? '',
            'email' => request('email') ?? '',
        ];

        $email = new SendEmailMarketing($details);
        Mail::to($details['email'])->send($email); 
        
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
