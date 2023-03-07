<?php

namespace App\Http\Controllers;

use App\Emails;
use App\Mail\SendEmailMarketing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailMarketingController extends Controller
{
    //

    // All Emails Will Load Here
    public function index(Request $request)
    {
        if ($request->has('delete')) {
            $id = $request->get('delete');
            $email = Emails::where("id",$request->get('delete'))->delete();
            return redirect()->route('emails.index')->with(["type"=>"danger","msg"=>"Emails record is deleted Successfully"]);
        }
        $emails = Emails::where("user_id", auth()->user()->id)->orderBy("id","desc")->get();
        $user= User::where('id',Auth::user()->id)->first();
       
        return view('email-marketing.index',compact('user','emails'));
    }


    // Create New Email Here
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'Name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255']
            ]);
        
            Emails::updateOrCreate(
                [
                    'email' => $request->input('email')
                ],
                [
                    'user_id' => auth()->user()->id,
                    'name' => $request->input('Name'),
                    'email' => $request->input('email'),
                    'via' => 'Admin'
                ]
            );
            return redirect()->route('emails.index')->with(["type"=>"success","msg"=>"Emails record is updated Successfully"]);
        }
        return view('email-marketing.create');
    }

    // Update Or Edit New Email Here
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $inputs = $request->validate([
                'name' =>  'required|string|max:255',
                'email' => 'required|email|unique:emails,email,'.$id,
            ]);
            $email = Emails::find($id);
            $email->update($inputs);
            return redirect()->route('emails.index')->with(["type"=>"success","msg"=>"Emails record is updated Successfully"]);
        }
        $email = Emails::find($id);
        return view('email-marketing.update',compact('email'));
    }


    // Send Multiple Emails at once with delay of 8 seconds
    public function send(Request $request)
    {
        if ($request->isMethod('post')) {


            $request->validate([
                'subject' =>  'required|string',
                'title' =>  'required|string',
                'company_name' =>  'required|string',
                'email_content' =>  'required|string'
            ]);

            if($request->hasfile('logo')){
                
                $file = $request->file('logo');
                $upload = 'public/img/';
                $filename = time().$file->getClientOriginalName();
                $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
                $fullpath = url($upload.$filename);
            }

            
            $subject = $request->subject;
			$title = $request->title;
			$company_name = $request->company_name;
			$email_content = $request->email_content;
            $details = [
                'id_from' => $request->id_from,
                'id_to' => $request->id_to,
                'subject' => $subject,
                'type' => "bulk",
                'logo' => $fullpath,
                'author' => auth()->user()->name,
                'title' => $title,
                'company_name' => $company_name,
                "content" => $email_content,
            ];
            $emails = Emails::where('user_id', auth()->user()->id)->get();
			foreach ($emails as $email) {
                $details['email'] = $email->email;
                $details['user_name'] = $email->name;

                $email = new SendEmailMarketing($details);
                Mail::to($details['email'])->send($email); 

                //(new \App\Jobs\SendEmailMarketingJob($details));

                /*
				$job = (new \App\Jobs\SendEmailMarketingJob($details))
			 		->delay(now()->addSeconds(8)); 
			    dispatch($job);
                */
			}
            return redirect()->route('emails.index')->with(["type"=>"success","msg"=>"Multiple emails are  sending successfully"]);
        }
        return view('email-marketing.send');
    }


    // send Email to single user
    public function single(Request $request, $id)
    {
        $record = Emails::find($id);
        if ($request->isMethod('post')) {
            $request->validate([
                'email' =>  'required|email',
                'subject' =>  'required|string',
                'email_content' =>  'required|string'
            ]);
            $email = $request->email;
            $subject = $request->subject;
			$email_content = $request->email_content;
            $details = [
                'email' => $email,
                'subject' => $subject,
                "content" => $email_content
            ];
            $email = new SendEmailMarketing($details);
            Mail::to($details['email'])->send($email); 
            /*
            (new \App\Jobs\SendEmailMarketingJob($details));
            
            $job = (new \App\Jobs\SendEmailMarketingJob($details))
                ->delay(now()->addSeconds(8)); 
            dispatch($job);
            */

            return redirect()->route('emails.index')->with(["type"=>"success","msg"=>"An Email is sent to $record->email successfully"]);
        }

        return view('email-marketing.single',compact('record'));
    }
}
