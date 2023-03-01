<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Docments;
use Illuminate\Http\Request;

class DocmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $docments = Docments::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('docments.index',compact('docments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('id','desc')->get();
        return view('docments.create',compact('customers'));
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
            'customer_id' => 'required|integer',
            'document_type' => 'required|string',
            'expiry_date' => 'required|date',
            'document_number' => 'required|string',
            'file' => 'required',
        ]);



        if($request->hasfile('file')){
            
            $file = $request->file('file');
            $upload = 'public/img/';
            $filename = time().$file->getClientOriginalName();
            $path = move_uploaded_file($file->getPathName(), $upload.$filename);
            $data['file'] = $upload.$filename;
        }

        $data['user_id'] = auth()->user()->id;
        Docments::create($data);
        return redirect()->route('docments.index')
            ->with(["type"=>"success","msg"=>"Documents added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docments  $docments
     * @return \Illuminate\Http\Response
     */
    public function show(Docments $docment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docments  $docments
     * @return \Illuminate\Http\Response
     */
    public function edit(Docments $docment)
    {
        $customers = Customer::orderBy('id','desc')->get();
        return view('docments.edit',compact('docment','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docments  $docments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docments $docment)
    {
        $data = $request->validate([
            'customer_id' => 'required|integer',
            'document_type' => 'required|string',
            'expiry_date' => 'required|date',
            'document_number' => 'required|string',
            'file' => 'nullable',
        ]);



        if($request->hasfile('file')){
            
            $file = $request->file('file');
            $upload = 'public/img/';
            $filename = time().$file->getClientOriginalName();
            $path = move_uploaded_file($file->getPathName(), $upload.$filename);
            $data['file'] = $upload.$filename;
        }

        $docment->update($data);
        return redirect()->route('docments.index')
            ->with(["type"=>"success","msg"=>"Documents updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docments  $docments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docments $docment)
    {
        $docment->delete();
        return redirect()->route('docments.index')
            ->with(['type'=>'danger', 'msg'=>'Documents deleted successfully']);
    }
}
