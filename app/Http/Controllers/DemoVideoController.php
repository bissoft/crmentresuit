<?php

namespace App\Http\Controllers;

use App\DemoVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DemoVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $videos = DemoVideo::where('created_by', Auth::id())->paginate(10);
        return view('record-screens.index', compact('videos'));
    }

    public function create()
    {
        return view('record-screens.video');
    }

    public function createDemoVideo()
    {
        return view('record-screens.create');
    }

    public function store(Request $request)
    {
        $recordVideo = new DemoVideo();

        if ($request->hasFile('file')) {
            $video = $request->file('file');
            $fileName = 'Demo-video-' . date('YmdHsi') . '.' . $video->getClientOriginalExtension();
            $destinationPath = public_path() . '/assets/videos/demo-videos';
            $video->move($destinationPath, $fileName);
//            $recordVideo->file_type = "video";
            $recordVideo->video = $fileName;
            $recordVideo->created_by = Auth::id();
            $recordVideo->save();

//            $users = User::where('id', '<>', Auth::id())->get();
//            $url = route('post.show', $recordVideo);
//            $data = collect([
//                'title' => 'New Post',
//                'url' => $url,
//                'picture' => Auth::user()->picture,
//                'body' => 'New Post form ' . Auth::user()->first_name . ' ' . Auth::user()->last_name
//            ]);
//            Notification::send($users, new DatabaseNotification($data));
            $response['status'] = true;
            $response['msg'] = 'Video saved successfully.';
        } else {
            $response['status'] = false;
            $response['msg'] = 'No video found.';
        }

        return response()->json($response);
    }

    public function storeDemoVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [
//            'description' => 'required',
//            'picture' => 'required',
            'heading' => 'required',
            'video' => 'required',
//            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $path = null;
        if ($request->has('picture')) {
            $image = $request->file('picture');
            $fileName = 'demo-thumbnail-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/assets/images/demo-thumbnails';
            $image->move($destinationPath, $fileName);
            $path = $fileName;
        }
        $video = null;
        if ($request->has('video')) {
            $image = $request->file('video');
            $fileName = 'Demo-video-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/assets/videos/demo-videos';
            $image->move($destinationPath, $fileName);
            $video = $fileName;
        }
        $task = DemoVideo::create([
            'description' => $request->description,
//            'picture' => $path,
            'video' => $video,
//            'user_id' => $request->user_id,
            'heading' => $request->heading,
            'created_by' => Auth::id(),
        ]);

        if ($task) {
            return redirect(route('demo-video.index'))->with('message', 'Demo Video Successfully Added.');
        } else {
            return back()->with('danger', 'Error Inserting Demo Video.');
        }
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $data = DemoVideo::where('id', $id)->first();
        return view('record-screens.create', ['list' => $data]);
    }

    public function update(Request $request, DemoVideo $demoVideo)
    {
        $validator = Validator::make($request->all(), [
//            'description' => 'required',
            'heading' => 'required',
//            'user_id' => 'required',
//            'video' => 'size:8192'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->has('picture')) {
            $image = $request->file('picture');
            $fileName = 'demo-thumbnail-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/assets/images/demo-thumbnails';
            $image->move($destinationPath, $fileName);
            $demoVideo->picture = $fileName;
        }
        if ($request->has('video')) {
            $image = $request->file('video');
            $fileName = 'demo-video-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path() . '/assets/videos/demo-videos';
            $image->move($destinationPath, $fileName);
            $demoVideo->video = $fileName;
        }
//        $wabinerVideo->user_id = $request->user_id;
        $demoVideo->description = $request->description;
        $demoVideo->heading = $request->heading;
        $demoVideo->updated_by = Auth::id();

        if ($demoVideo->save()) {
            return redirect(route('demo-video.index'))->with('message', "Demo Video Successfully Updated!");
        } else {
            return back()->with('danger', "Error Updating Demo Video.");
        }
    }

    public function destroy(DemoVideo $demoVideo)
    {
        if ($demoVideo->forceDelete()) {
            return back()->with('message', 'Demo Video Successfully Deleted!');
        } else {
            return back()->with('danger', 'Error Deleting Demo Video.');
        }
    }

    public function trash()
    {
        $videos = DemoVideo::latest()
            ->onlyTrashed()
            ->paginate(10);
        return view('record-screens.index', compact('videos'));
    }

    public function recoverDemoVideo($id)
    {
        $data = DemoVideo::onlyTrashed()->findOrFail($id);
        if ($data->restore())
            return back()->with('message', 'Demo Video Successfully Restored!');
        else
            return back()->with('danger', 'Error Restoring Demo Video.');
    }

    public function remove($id)
    {
        $data = DemoVideo::where('id', $id)->first();
        $data->deleted_by = Auth::user()->id;
        $data->save();
        if ($data->delete()) {
            return back()->with('message', 'Demo Video Successfully Trashed!');
        } else {
            return back()->with('message', 'Error Deleting Demo Video.');
        }
    }

}
