<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index",compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::all();
        $users = User::all();
        return view("projects.create",compact('customers','users'));
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
            'customer_id' => 'required',
            'billing_type_id' => 'required',
            'start_date' => 'required',
        ]);

        $data['calculate_progress_through_tasks'] = $request->has('calculate_progress_through_tasks') ? 1 : 0 ;
        $data['progress'] = $request->has('progress') ? $request->input('progress') : 0 ;
        $data['status_id'] = $request->input('status_id');
        $data['dead_line'] = $request->input('dead_line');
        $data['description'] = $request->input('description');

        $data['user_id'] = $request->has('user_id') ? implode(',',$request->input('user_id')) : NULL ;
        $data['tag_id'] = $request->has('tag_id') ? implode(',',$request->input('tag_id')) : NULL ;
        $data['billing_rate'] = $request->input('billing_rate');
        

        Project::create($data);
        return redirect()->route('projects.index')
            ->with(['type'=>'success', 'msg'=>'Project added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $customers = User::all();
        $users = User::all();
        return view("projects.edit",compact('project','customers','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required',
            'customer_id' => 'required',
            'billing_type_id' => 'required',
            'start_date' => 'required',
        ]);

        $data['calculate_progress_through_tasks'] = $request->has('calculate_progress_through_tasks') ? 1 : 0 ;
        $data['progress'] = $request->has('progress') ? $request->input('progress') : 0 ;
        $data['status_id'] = $request->input('status_id');
        $data['dead_line'] = $request->input('dead_line');
        $data['description'] = $request->input('description');

        $data['user_id'] = $request->has('user_id') ? implode(',',$request->input('user_id')) : NULL ;
        $data['tag_id'] = $request->has('tag_id') ? implode(',',$request->input('tag_id')) : NULL ;
        $data['billing_rate'] = $request->input('billing_rate');
        

        $project->update($data);
        return redirect()->route('projects.index')
            ->with(['type'=>'success', 'msg'=>'Project updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with(['type'=>'danger', 'msg'=>'project deleted successfully']);
    }
}
