<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    //

    public function index(Request $request)
    {
        $referrals = auth()->user()->referrals;
        $referrer = auth()->user()->referrer;
        $link = url("/?ref="). \Hashids::encode(auth()->user()->id);
        return view('referral.index',compact('referrals','referrer','link'));
    }
}
