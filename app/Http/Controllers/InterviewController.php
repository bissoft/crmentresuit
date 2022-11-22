<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ZoomMeetingController;
use App\Interview;
use App\Traits\ZoomMeetingTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Gate;
use Illuminate\Support\Facades\Auth;

//from Here trait name spaces used

use Illuminate\Database\Eloquent\Builder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Auth\Traits\Attribute;
use App\UserZoomCredential;

//here end...........................
session_start();
class InterviewController extends Controller
{
   //  use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

	 
	 public $client;
    public $jwt;
    public $headers;
	 public $n =1;
    public function __construct($n ='')
    {
			$this->client = new Client();
			$this->jwt = $this->generateZoomToken();
			$this->headers = [
					'Authorization' => 'Bearer ' . $this->jwt,
					'Content-Type'  => 'application/json',
					'Accept'        => 'application/json',
			];
    }

    public function index()
    { 
		$user_id=$_SESSION["zoom_id"] = Auth::user()->id;
      //   abort_if(Gate::denies('video_interview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return 0;
        // $path = 'users/me/meetings';
        // $response = $this->zoomGet($path);

        // $data = json_decode($response->body(), true);
        // $data['meetings'] = array_map(function (&$m) {
        //     $m['start_at'] = $this->toUnixTimeStamp($m['start_time'], $m['timezone']);
        //     return $m;
        // }, $data['meetings']);
        // $meetings =json_encode($data['meetings']);
        // return $meetings;
		  
        $interview = Interview::all();
		  $zoom = UserZoomCredential::where('user_id',$user_id)->get()->first();
        return view('admin.interview/index',compact('interview','zoom'));
        // return [
        //     'success' => $response->ok(),
        //     'data' => $data,
        // ];
    }
	 public function credentials()
	 {
		$user_id = Auth::user()->id;
		// dd($user_id);
		if(request()->isMethod('post')){
			// dd(request()->all());
			request()->validate([
				'name' => 'required',
				'api_url' => 'required',
				'api_key' => 'required',
				'api_secret' => 'required',
			]);	
			$id = request('id');
			$name = request('name');
			$api_url = request('api_url');
			$api_key = request('api_key');
			$api_secret = request('api_secret');
			$zoom = UserZoomCredential::updateOrCreate([
				'id' => $id
			],[
				'user_id' =>$user_id,
				'name' =>$name,
				'api_url' =>$api_url,
				'api_key' =>$api_key,
				'api_secret' =>$api_secret
			]);
			return redirect(url('/').'/video-meeting')->with(["type"=>"success","msg"=>"Your Credential Created successfully"]);
		}
		$zoom = UserZoomCredential::where('user_id',$user_id)->get()->first();
		return view('admin.interview/credentials',compact('zoom'));
	 }
    public function add(){
      //   abort_if(Gate::denies('video_interview_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::all();
        return view('admin/interview.create',compact('user'));
    }
    public function store(Request $request)
    {
// dd($request->all());
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'duration' => 'required',
            'user' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($data['start_time']),
            'duration' => $data['duration'],
            'agenda' => 'interview',
            'timezone'  => 'Asia/Karachi',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
		//   dd($response);
        $interview = new Interview;
        $interview->topic = $data['topic'];
        $interview->start_time = $data['start_time'];
        $interview->invite_link = $response['join_url'];
        $interview->duration = $data['duration'];
        $interview->user_id = $data['user'];
        $interview->uuid = $response['id'];
        $interview->creater_user_id = auth()->user()->id;
        $interview->save();
        return redirect('video-meeting')->with('success','Meeting has created!');
        // return [
        //     'success' => $response->status() === 201,
        //     'data' => json_decode($response->body(), true),
        // ];
    }
    public function edit(Request $request, $id)
    {
      //   abort_if(Gate::denies('video_interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $path = 'meetings/' . $id;
        // $response = $this->zoomGet($path);

        // $data = json_decode($response->body(), true);
        // if ($response->ok()) {
        //     $data['start_at'] = $this->toUnixTimeStamp($data['start_time'], $data['timezone']);
        // }
        // $meeting = json_encode($data);
        $interview = Interview::find($id);
        $user = User::all();
        return view('admin.interview/edit',compact('interview','user'));
        // return [
        //     'success' => $response->ok(),
        //     'data' => $data,
        // ];
    }
    public function updated(Request $request, $id)
    {
        $interview = Interview::find($id);
        $validator = Validator::make($request->all(), [
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'user' => 'required',
            'duration' => 'required'
        ]);

        if ($validator->fails()) {
            return [
                'success' => false,
                'data' => $validator->errors(),
            ];
        }
        $data = $validator->validated();

        $path = 'meetings/' . $interview->uuid;
        $response = $this->zoomPatch($path, [
            'topic' => $data['topic'],
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => (new \DateTime($data['start_time']))->format('Y-m-d\TH:i:s'),
            'duration' => $data['duration'],
            'agenda' => 'interview',
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);
        $interview->topic = $data['topic'];
        $interview->start_time = $data['start_time'];
        $interview->duration = $data['duration'];
        $interview->user_id = $data['user'];
        $interview->update();
        return redirect('video-meeting')->with('success','Meeting has updated!');
        // return [
        //     'success' => $response->status() === 204,
        //     'data' => json_decode($response->body(), true),
        // ];
    }
    public function destroy(Request $request)
    {
        $interview = Interview::find($request->id);
        $path = 'meetings/' . $interview->uuid;
        $response = $this->zoomDelete($path);
        $interview->delete();
        return response(['message' => 'Meeting delete successfully']);
        // return [
        //     'success' => $response->status() === 204,
        //     'data' => json_decode($response->body(), true),
        // ];
    }



	 //From here trait code is started.......................................
	 
    public function generateZoomToken()
    {
		
		$user_id = $_SESSION["zoom_id"] ?? '';
		$zoom = UserZoomCredential::where('user_id',$user_id)->get()->first();
		$key = $zoom->api_key ?? '';
		$secret = $zoom->api_secret ?? '';
		
		//   $key = env('ZOOM_API_KEY', '');
      //   $secret = env('ZOOM_API_SECRET', '');
		// dd($key);
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];

        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    private function retrieveZoomUrl()
    {
		$user_id = $_SESSION["zoom_id"] ?? '';
		$zoom = UserZoomCredential::where('user_id',$user_id)->get()->first();
      //   return env('ZOOM_API_URL', '');
        return $zoom->api_url ?? '';
    }
    private function zoomRequest()
    {
        $jwt = $this->generateZoomToken();
        return \Illuminate\Support\Facades\Http::withHeaders([
            'authorization' => 'Bearer ' . $jwt,
            'content-type' => 'application/json',
        ]);
    }

    public function zoomGet(string $path, array $query = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->get($url . $path, $query);
    }

    public function zoomPost(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->post($url . $path, $body);
    }

    public function zoomPatch(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->patch($url . $path, $body);
    }

    public function zoomDelete(string $path, array $body = [])
    {
        $url = $this->retrieveZoomUrl();
        $request = $this->zoomRequest();
        return $request->delete($url . $path, $body);
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);
            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());
            return '';
        }
    }

    public function toUnixTimeStamp(string $dateTime, string $timezone)
    {
        try {
            $date = new \DateTime($dateTime, new \DateTimeZone($timezone));
            return $date->getTimestamp();
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toUnixTimeStamp : ' . $e->getMessage());
            return '';
        }
    }

    

    public function create($data)
    {
        $path = 'users/me/meetings';
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([
                'topic'      => $data['topic'],
                'type'       => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration'   => $data['duration'],
                'agenda'     => (!empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone'     => 'Asia/Kolkata',
                'settings'   => [
                    'host_video'        => ($data['host_video'] == "1") ? true : false,
                    'participant_video' => ($data['participant_video'] == "1") ? true : false,
                    'waiting_room'      => true,
                ],
            ]),
        ];

        $response =  $this->client->post($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 201,
            'data'    => json_decode($response->getBody(), true),
        ];
    }

    public function update($id, $data)
    {
        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();

        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([
                'topic'      => $data['topic'],
                'type'       => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($data['start_time']),
                'duration'   => $data['duration'],
                'agenda'     => (!empty($data['agenda'])) ? $data['agenda'] : null,
                'timezone'     => 'Asia/Kolkata',
                'settings'   => [
                    'host_video'        => ($data['host_video'] == "1") ? true : false,
                    'participant_video' => ($data['participant_video'] == "1") ? true : false,
                    'waiting_room'      => true,
                ],
            ]),
        ];
        $response =  $this->client->patch($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data'    => json_decode($response->getBody(), true),
        ];
    }

    public function get($id)
    {
        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();
        $this->jwt = $this->generateZoomToken();
        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([]),
        ];

        $response =  $this->client->get($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
            'data'    => json_decode($response->getBody(), true),
        ];
    }

    /**
     * @param string $id
     * 
     * @return bool[]
     */
    public function delete($id)
    {
        $path = 'meetings/' . $id;
        $url = $this->retrieveZoomUrl();
        $body = [
            'headers' => $this->headers,
            'body'    => json_encode([]),
        ];

        $response =  $this->client->delete($url . $path, $body);

        return [
            'success' => $response->getStatusCode() === 204,
        ];
    }


}
