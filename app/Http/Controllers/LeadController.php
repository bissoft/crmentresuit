<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomField;
use App\Emails;
use App\Lead;
use App\LeadStatus;
use App\Mail\SendEmailMarketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::all();
        return view('leads.index',compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = DB::table('lead_statuses')->get()->pluck('name','id');
        $sources = DB::table('lead_sources')->get()->pluck('name','id');
        $members = DB::table('customers')->where('customer_id', auth()->user()->id)->get()->pluck('name','id');
        return view('leads.create',compact('statuses','sources','members'));
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
            'source_id' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'company_name' => 'required',
            'position' => 'nullable',
            'status_id' => 'required',
            'phone' => 'nullable',
            'contact' => 'nullable',
            'land_line' => 'nullable',
            'website' => 'nullable',
            'country' => 'nullable',
            'description' => 'nullable'
        ]);
        Lead::create($data);
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        return view('leads.show',compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $statuses = DB::table('lead_statuses')->get()->pluck('name','id');
        $sources = DB::table('lead_sources')->get()->pluck('name','id');
        $members = DB::table('customers')->where('customer_id', auth()->user()->id)->get()->pluck('name','id');
        return view('leads.edit',compact('lead','statuses','sources','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'source_id' => 'required',
            'contact' => 'required',
            'gender' => 'required',
            'company_name' => 'required',
            'position' => 'nullable',
            'status_id' => 'required',
            'phone' => 'nullable',
            'contact' => 'nullable',
            'land_line' => 'nullable',
            'website' => 'nullable',
            'country' => 'nullable',
            'description' => 'nullable'
        ]);
        $lead->update($data);
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')
            ->with(['type'=>'success', 'msg'=>'Lead deleted successfully']);
    }

    public function leadCampaign(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'subject' =>  'required|string',
                'email_content' =>  'required|string'
            ]);

            $subject = $request->subject;
			$email_content = $request->email_content;

            $details = [
                'type' => 'booking',
                'subject' => $subject,
                "content" => $email_content
            ];

            $emails = Emails::where('user_id', auth()->user()->id)->get();
			foreach ($emails as $email) {
                $details['email'] = $email->email;

                $email = new SendEmailMarketing($details);
                Mail::to($details['email'])->send($email); 

                //(new \App\Jobs\SendEmailMarketingJob($details));

                /*
				$job = (new \App\Jobs\SendEmailMarketingJob($details))
			 		->delay(now()->addSeconds(8)); 
			    dispatch($job);
                */
			}
            return redirect()->route('leads.index')->with(["type"=>"success","msg"=>"Lead compagin emails are sending successfully"]);

        }
        $lead = Lead::find($id);
        return view('leads.email-compaign',compact('lead'));
    }

    public function leadCustomer(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $lead = Lead::find($id);
            $default_language = DB::table('settings')->select('value')->where('name', 'default_language')->first();
            $customer                  = new Customer();
            $customer->customer_id     = $this->customerNumber();
            $customer->name            = $lead->name;
            $customer->contact         = $lead->contact;
            $customer->gender         = $lead->gender;
            $customer->departments         = $lead->departments;
            $customer->designation         = $lead->designation;
            $customer->office_shift         = $lead->office_shift;
            $customer->email           = $lead->email;
            $customer->password        = Hash::make(12345678);
            $customer->created_by      = \Auth::user()->creatorId();
            $customer->billing_name    = $lead->name;
            $customer->billing_country = $lead->country;

            $customer->shipping_name    = $lead->name;
            $customer->shipping_country = $lead->country;

            $customer->lang = !empty($default_language) ? $default_language->value : '';

            $customer->save();
            CustomField::saveData($customer, $request->customField);


            $role_r = Role::where('name', '=', 'customer')->firstOrFail();
            $customer->assignRole($role_r);
            $lead->is_customer = 1;
            $lead->update();
            return redirect()->route('leads.index')->with(["type"=>"success","msg"=>"Lead changes to customer successfully"]);
        }
        return redirect()->route('leads.index')->with(["type"=>"success","msg"=>"Something Went wrong Please try again later"]);
    }

    function customerNumber()
    {
        $latest = Customer::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if(!$latest)
        {
            return 1;
        }

        return $latest->customer_id + 1;
    }
}
