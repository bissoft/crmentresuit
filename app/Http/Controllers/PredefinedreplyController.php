<?php

namespace App\Http\Controllers;

use App\Predefinedreply;
use Illuminate\Http\Request;

class PredefinedreplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $predefinedreplies = Predefinedreply::all();
        return view('predefined-replies.index',compact('predefinedreplies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predefined-replies.create');
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
            'question' => 'required',
            'answer' => 'required'
        ]);

        Predefinedreply::create($data);

        return redirect()->route('predefined-replies.index')
            ->with(["type"=>"success","msg"=>"Predefined Reply added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Predefinedreply  $predefinedreply
     * @return \Illuminate\Http\Response
     */
    public function show(Predefinedreply $predefinedreply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Predefinedreply  $predefinedreply
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predefinedreply = Predefinedreply::find($id);
        return view('predefined-replies.edit',compact('predefinedreply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Predefinedreply  $predefinedreply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $predefinedreply = Predefinedreply::find($id);
        $predefinedreply->update($data);

        return redirect()->route('predefined-replies.index')
            ->with(["type"=>"success","msg"=>"Predefined Reply updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Predefinedreply  $predefinedreply
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $predefinedreply = Predefinedreply::find($id);
        $predefinedreply->delete();
        return redirect()->route('predefined-replies.index')
            ->with(['type'=>'danger', 'msg'=>'Predefined Reply deleted successfully']);
    }
}
