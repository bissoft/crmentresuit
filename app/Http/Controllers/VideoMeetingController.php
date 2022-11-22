<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Controllers\ZoomMeetingController;
use App\Interview;


//here end...........................
session_start();

class VideoMeetingController extends Controller
{

	public function index()
	{
		 $interview = Interview::where('user_id',Auth()->user()->id)->orderBy('created_at','DESC')->get();
		 return view('client/interview',compact('interview'));
	}


}
