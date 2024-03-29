<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $heads = Customer::get()->pluck('name', 'id');
        return view('departments.index',compact('departments','heads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heads = Customer::get();
        return view('departments.create', compact('heads'));
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
            'head_id' => 'required',
            'email' => 'required|unique:departments,email'
        ]);
 
        Department::create($data);

        return redirect()->route('departments.index')
            ->with(["type"=>"success","msg"=>"Department added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $heads = Customer::get();
        return view('departments.edit',compact('department','heads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => 'required',
            'head_id' => 'required',
            'email' => 'required'
        ]);

        $department->update($data);

        return redirect()->route('departments.index')
            ->with(["type"=>"success","msg"=>"Department updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')
            ->with(['type'=>'danger', 'msg'=>'Department deleted successfully']);
    }
}
