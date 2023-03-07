<?php

namespace App\Http\Controllers;

use App\Console\Commands\LogCron;
use App\Models\Campaign;
use App\Models\Leads;
use App\Models\Email;
use App\Models\Mails;
use App\Mail\TestEmail;
use DB;
use App\Models\Schedule;
use App\Models\Sequence;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MailImport;
use App\Exports\MailExport;
use App\Models\Credential;
use App\Http\Controllers\CredentialController;
use App\Models\emailAccounts;
use App\Models\GetEmailUsedForSend;
use App\Models\ReplyCount;
use App\Models\ReplyEmail;
use App\Models\Sendemailstatus;
use App\Models\WarmupCampaigns;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{

    public function index()
    {
		$user_id = Auth::user()->id;
      $info = Campaign::where('user_id',$user_id)->get()->all();
		//get enable disable schedule.................
		
		$date = "";
		$ac_cam='';
		$ac_cam = Campaign::with('schedule')->whereHas('schedule', function ($query) {
			$query->where('campaign_enable_disable', 1);
	  })->get()->all();
        //   $date = Campaign::find(1)->created_at->format('Y-m-d');
        return view('campaigns.index',compact('info','date','ac_cam'));
            // ->with(compact('info'))
            // ->with(compact('date'));
    }

	  //compaign option controller.................................
	  public function analytics()
	  { 	
			$user_id = Auth::user()->id;
			$campaign_id = request("id");
			$user = request('id');
			// $cam_check = Campaign::where('id',$user)->where('user_id',$user_id)->exists();
			// if(!$cam_check){
			// 	return redirect(url('/').'/campaigns')->with('success','Please create Campaign First');
			// }
			// dd($cam_check);
			$emails_sended=array();
			$email_used_to_send = 0;
			$reply_email_from = 0;
			$active_status = 0;
			
			$schedule = Schedule::where("campaign_id",$user)->first();
			//get enable disable schedule.................
			if(!empty($schedule->campaign_enable_disable)){
				$active_status =$schedule->campaign_enable_disable;
			}
			$campaign = Campaign::where('id',$user)->first();
			$status = Sendemailstatus::where('campaign_id', $user)->get()->all();
			// dd($status);
			foreach ($status as $key => $val) {
				//get email account used to send email.......
				$email_ac=	emailAccounts::where('id',$val->email_status)->first();
				if(!empty($email_ac)){
					$email_used_to_send =$email_ac->email_name;
				}
				//get users emails..................................
				$get_emails= Mails::where('id',$val->email_id)->get()->first();
				$reply_email= ReplyEmail::where('email_from',$get_emails->email ?? '')->where('email_to',$email_used_to_send)->first();
				if(!empty($reply_email)){
					if($reply_email->email_from === $reply_email_from){

					}else{
						//this is for if same email count again
						$reply_email_from = $reply_email->email_from;
						//................
						$emails_sended[] = array(
							"user_emails" => $reply_email->email_from,
							"key"=>$key+1,
						);
						$check= ReplyCount::where('email',$reply_email->email_from)->where('user_id',$user_id)->exists();
						if(!$check){{
							ReplyCount::create([
								'email' => $reply_email->email_from,
								'campaign_id'=>$campaign_id,
								'user_id' =>$user_id
							]);
						}}
					}
				}
			}//end foreach
			
			$open_email = Sendemailstatus::where('campaign_id', $user)->where('open_email_status',1)->get()->all();
			$emails = DB::table('mails')->where('campaign_id', $user)->get();
		//........................................
	
			$reply_count= count($emails_sended);
			$open_email = count($open_email);
			$send_email = count($status) ;
			if(count($status) > 0){
				$open_rate	= round(($open_email*100)/$send_email);
				$reply_rate=round(($reply_count*100)/$send_email);
			}else{
			$send_email = 0;
			$open_rate = 0;
			$reply_rate=0;
			}

			//lead part start here...............................
			$sending_emails = Mails::where('campaign_id', $campaign_id)->get();
			//sequence part start here...........................
			$email_sequence = Sequence::where('campaign_id', $campaign_id)->first();
			//schedule part start here...........................
			$schedule = Schedule::where("campaign_id",$campaign_id)->first();
			//schedule part start here...........................
			$data = emailAccounts::where('user_id',$user_id)->where('status',1)->get()->all();
			//Warmup Campaign part..............
			$warmup=WarmupCampaigns::where('campaign_id',$campaign_id)->get()->first();

			return view('campaigns.campaign-options',compact('warmup','data','schedule','email_sequence','sending_emails','campaign_id','user','emails','status','campaign','open_email','send_email','open_rate','reply_count','reply_rate','active_status'));
	
		// $faq = Faq::where('heading', 'LIKE', '%'.$request->search.'%')
		// ->orWhere('description', 'LIKE', '%'.$request->search.'%')->get();
		 
	  }
	  //campaign pause resume 
	  public function campaignStatus()
	  {
			$id = request('id');
			$status = 1;
			$sch =Schedule::where('campaign_id',$id)->first();
			if(!empty($sch)){
				$sched =$sch->campaign_enable_disable;
				if($sched == 1){
					$status = 0;
				}
				Schedule::where('campaign_id',$id)->update([
					'campaign_enable_disable' => $status,
				]);
			}
			return back();
	  }
	  //search......................................................
	  public function search() 
	  {
		if(request()->has("q")){
			$search = request("q");
			$user_id = request('user_id');
			$status = Sendemailstatus::where('campaign_id', $user_id)->get()->all();
			$email_id = DB::table('mails')->where('email','like','%'.$search.'%')->where('campaign_id',$user_id)->get()->all();
			// dd($email_id);
			return redirect(url('/').'/analytics?id='.$user_id)->with('message',$email_id);
		}
		
	  }
	  //create campaign.............................................
    public function create(Request $request)
    {
        $info = new Campaign;

        $request->validate([
            'name'    => 'required',

        ]);
		  $user_id = Auth::user()->id;
        $info->name = $request->name;
        $info->user_id = $user_id;
        $info->save();
		  $user = $info->id;
        return redirect(url('/').'/analytics?id='.$user);
    }

//Lead part start here ..................................................//
    public function addmail(Request $request)
    {
        $id = $request->campaign_id;
        $email = $request->email;
        $rowCount = 0;

        $request->validate([
            'email'    => 'required',
            'name'    => 'required',
        ]);

        if (Mails::where('email', $email)->where('campaign_id', $id)->count() == 0) {

            $item = new Mails();
            $item->email = $request->email;
            $item->name = $request->name;
            $item->campaign_id = $request->campaign_id;
            $item->save();
            $rowCount++;
        } else {
            // dd('123');
            return redirect()->back()->with(['lead'=> 1, 'type'=>'danger' , 'msg'=>'Email already Exist']);
        }
        return redirect()->back()->with(['lead'=> 1, 'type'=>'success' ,'msg'=> 'Email Added Successfully']);
    }

	//this is for delete emails................................
	public function destroy($id)
	{
		DB::table('mails')->where('id', $id)->delete();
		return redirect()->back()->with(['lead'=> 1, 'type'=>'danger' , 'msg' =>'Deleted successfully']);
	}
	//End of Lead part.........................................////end
	//Sequence part start here........................................//
	//sequence update Or add.
	public function update(Request $request)
	{
		
		if($request->isMethod('post')){
		// dd('ok');
		$request->validate([
				'subject'    => 'required',
				'description' => 'required',
		]);
		$user_id = Auth::user()->id;
		$id = $request->campaign_id;

		$sec= Sequence::updateOrCreate([
		'campaign_id' => $id
		],	[
		'user_id' => $user_id,
		'subject' => $request->subject,
		'description' => $request->description,
		]);
		return redirect()->back()->with(['sequences'=> 2, 'type'=>'success' ,'msg'=> 'Email Added Successfully']);
		}
	}
	//this is delete sequence
	public function seq_delete($id)
	{
		// dd('ok');
		$user_id = Auth::user()->id;
		Sequence::where('campaign_id',$id)->where('user_id',$user_id)->delete();
		return redirect()->back()->with(['sequences'=> 2, 'type'=>'danger' ,'msg'=> 'Sequence Deleted Successfully']);
	}
	//End of Sequence...........................................////end
	//Schedule part start here..................................//
	public function saveSchedule(Request $request)
	{
		//   dd(request()->all());
		 $id = $request->id;
		 $m = $request->has('monday') ? 1 : 0;
		 $t = $request->has('tuesday') ? 1 : 0;
		 $w = $request->has('wednesday') ? 1 : 0;
		 $th = $request->has('thursday') ? 1 : 0;
		 $f = $request->has('friday') ? 1 : 0;
		 $s = $request->has('saturday') ? 1 : 0;
		 $sun = $request->has('sunday') ? 1 : 0;

		 $request->validate([
			  'start_time'    => 'required',
			  'end_time'    => 'required',
			  'schedule_name'    => 'required',
		 ]);

		 Schedule::updateOrCreate(
			  ['campaign_id' => $id],
			  [
			  'start_time' => $request->start_time,
			  'end_time' => $request->end_time,
			  'schedule_name' => $request->schedule_name,
			  'monday' => $m,
			  'tuesday' => $t,
			  'wednesday' => $w,
			  'thursday' => $th,
			  'friday' => $f,
			  'saturday' => $s,
			  'sunday' => $sun,
			  'campaign_id' => $request->id,
			  'campaign_enable_disable' => 1,
			 ] );
		 return redirect()->back()->with(['schedule'=> 3, 'type'=>'success' ,'msg'=> 'Schedule created Successfully']);
	}
	public function sch_delete($id)
	{
		// dd('ok');
		Schedule::where('campaign_id',$id)->delete();
		return redirect()->back()->with(['schedule'=> 3, 'type'=>'danger' ,'msg'=> 'Sequence Deleted Successfully']);
	}
	//Schedule part start here..................................////end
    public function sendMail(Request $request)
    {
		// dd(request()->all());
		function genral()
		{
			return 'this';
		}
		$sending_mail_stop = $request->has('sending_mail_stop') ? 1 : 0;
		$rewrite_emails = $request->has('rewrite_emails') ? 1 : 0;
		$smart_send = $request->has('smart_send') ? 1 : 0;
		$dailySendingLimit = $request->dailySendingLimit;

			// dd($sending_mail_stop.' '.$rewrite_emails.' '.$smart_send);
        $email = $request->email; 
        $id = $request->campaign_id;
        $user_id = Auth::user()->id;
	

        $check = emailAccounts::where('email_name', $email)->where('user_id',$user_id)->exists();
         
        if ($check == true) {
			//save data to warmup..................................
			$we= WarmupCampaigns::updateOrCreate([
				'campaign_id' => $id
				],[
					'user_id' =>$user_id,
					'sending_mail_stop' => $sending_mail_stop,
					'rewrite_emails' => $rewrite_emails,
					'smart_send'	=> $smart_send,
					'dailySendingLimit'=>$dailySendingLimit,
					'email' =>$email
				]);//end of save warmup data
            // $c = Credential::where('user_id', $user_id)->where('email', $email)->first();
            $c = emailAccounts::where('email_name', $email)->first();
            $name = $c->firstName.''.$c->lastName;
            $email = $c->email_name;
            $password = $c->password;
            $env_update = $this->changeEnv([
                'MAIL_USERNAME'   => $email,
                'MAIL_PASSWORD'   => $password,
                'MAIL_FROM_ADDRESS' => $email,
                'MAIL_FROM_NAME' => $name,
            ]);

            if ($env_update) {
					GetEmailUsedForSend::where('campaign_id', $id)->delete();
					GetEmailUsedForSend::create([
						'campaign_id' => $id,
						'email_id_used_for_send' => $c->id,
					]);
            //    dd('123');
               //  $info = Sequence::where('campaign_id', $id)->first();
               //  $subject = $info->subject;
               //  $body = $info->description;
               //  $details = [
               //      'subject' => $subject,
               //      'body' => $body,
               //      'campaign_id' => $id,
					// 	  'email_used'	=> $c->id,
               //  ];
			//............................................................................................................
	
					 Sendemailstatus::where('campaign_id', $id)->delete();

                return redirect('/campaigns')->with('success', 'Campaign Launched Successfully');
            }
            
             else {
                return redirect()->back()->with('error', 'Error');
            }
        }
        else {
            return redirect()->back()->with('error', 'You have not added any email yet');
        }
    }
    protected function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');
            Artisan::call('optimize:clear');
            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach ((array)$data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

   //  public function leads($id)
   //  {
   //      $info = Mails::where('campaign_id', $id)->get();
   //      $count = count($info);
	// 		$user =$id;
   //      return view('campaigns.leads')
   //          ->with(compact('info'))
   //          ->with(compact('count','user' ));
   //  }
   //  public function sequence($id)
   //  {
   //      $check = Sequence::where('campaign_id', $id)->exists();

	// 		$user = $id;
   //      if ($check == false) {
   //          return view('campaigns.sequence',compact('user'));
   //      } else {
   //          $info = Sequence::where('campaign_id', $id)->first();
   //          return view('campaigns.edit',compact('info','user'));
               
   //      }
   //  }

    public function fileImport(Request $request)
    {
        $campaign_id = $request->campaign_id;

        if ($request->hasFile('file')) {
            if ($request->file->getClientOriginalExtension() == 'csv') {

                Excel::import(new MailImport($campaign_id), request()->file('file'));
                return redirect()->back()->with('success', 'Data Imported Successfully');
            } else {
                return redirect()->back()->with('error', 'Error in file extension');
            }
        } else {
            return redirect()->back()->with('error', 'File not found');
        }
    }
    public function fileExport(Request $request)
    {
        $campaign_id = $request->campaign_id;
        return Excel::download(new MailExport($campaign_id), 'email.csv');
    }
	 //Schedule .......................................................................
	//  public function schedule($id)
   //  {		$user = $id;
   //      $schedule = Schedule::where("campaign_id",$id)->first();
   //      return view('campaigns.scheduleadd',compact('schedule','user'));
   //  }


   //  public function options($id)
   //  {
   //      $user_id = Auth::user()->id;
	// 	  $user = $id;
	// 	  //this is for to check account is active or not..........................................
	// 	//   $email_account =emailAccounts::where("user_id", $user_id)->where('status',1)->get()->all();
	// 		// foreach ($email_account as $key => $val) {
	// 		// 	getEmail($val->email_name,$val->password);
	// 		// }

   //      $data = emailAccounts::where('user_id',$user_id)->where('status',1)->get()->all();
	// 	//   dd($data);
   //      return view('campaigns.option')
   //          ->with(compact('data','user'));
   //  }



    public function storemail(Request $request)
    {

        $info = new Sequence();

        $request->validate([
            'subject'    => 'required',
            'description'    => 'required',

        ]);
        $info->subject = $request->subject;
        $info->description = $request->description;
        $info->campaign_id = $request->campaign_id;
        $info->save();
        return redirect()->back()->with('message', 'data Saved Successfully');
    }


    public function deleteCampaign($id)
    {

        DB::table('campaigns')->where('id', $id)->delete();
        return redirect()->back()
            ->with('success', 'Deleted successfully');
    }

}
