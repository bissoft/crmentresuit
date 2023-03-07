<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intake;
use App\Lead;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        $intake=Intake::all();
        return view('intake.index',compact('intake'));
    }

    public function deleteIntake(Request $request, $id)
    {
        $intake = Intake::find($id);
        $intake->delete();
        return redirect()->route('intake.index')
            ->with(['type'=>'danger', 'msg'=>'Intake deleted successfully']);
    }

    public function intake(){
        
        
        return view('intake');
    }

    public function editIntake(Request $request , $id){
        if ($request->isMethod('post')) {

            $validation = $request->validate(
                [
                    'logo' => 'nullable',
                    'name' => 'required|max:255',
                    'address' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'date_of_birth' => 'required',
                    
                ]
            );

            $product = Intake::find($request->input('intake_id'));
            $product->name = $request->name;
            $product->address = $request->address;
            $product->phone = $request->phone;
            $product->email = $request->email;
            $product->date_of_birth = $request->date_of_birth;
    
            $product->emergency = $request->emergency??'';
            $product->contact = $request->contact??'';
            $product->help = $request->help??'';
            
            if($request->hasfile('logo')){
                
                $file = $request->file('logo');
                $upload = 'public/img/';
                $filename = time().$file->getClientOriginalName();
                $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
                $product->logo=$upload.$filename;
            }
            
            $custom_fields = "";
            $custom_name = request('custom_name');
            $custom_value    = request('custom_value');
    
            $custom_field    = array();
            if (is_array(request("custom_value"))) {
                for ($a = 0; $a < count($custom_name); $a++) {
                    if ($custom_value[$a] != "") {
                        $custom_field[] = array(
                            "custom_name" => $custom_name[$a],
                            "custom_value"    => $custom_value[$a],
                        );
                    }
                }
                
            }
            
            $custom_fields = json_encode($custom_field);
            $product->custom_field = $custom_fields;

            $product->update();
            return redirect()->route('intake.index')
            ->with(['type'=>'success', 'msg'=>'Intake updated successfully']);

        }
        $intake = Intake::find($id);
        return view('intake.edit',compact('intake'));
    }

    public function showIntake($id)
    {
        $intake = Intake::find($id);
        return view('intake.show',compact('intake'));
    }
	
    public function aboutus(){
        
        return view('aboutus');
    }
    public function contactus(){
        
        return view('contactus');
    }


    public function appCustomization(Request $request)
    {
        if ($request->isMethod('post')) {

            $user = Auth::user();
            $data = $request->validate([
                'app_name' => 'required'
            ]);
            if($request->file('app_logo')){
                $file= $request->file('app_logo');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('assets/images'), $filename);
                $data['app_logo'] = $filename;

                $user->app_logo = $filename;
            }

            $user->app_name = $request->input('app_name');
            $user->save();
            return redirect()->back();
        }

        if ($request->has('del')) {

            $user = Auth::user();
            
            $user->app_logo = null;
            $user->save();
            return redirect()->back();
        }

        return view('user.app-customization');
    }

    public function store(Request $request)
    {
        $validation = $request->validate(
            [
                'logo' => 'required',
                'name' => 'required|max:255',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'date_of_birth' => 'required',
                
            ]
        );
		//   dd($request->all());
        $product = new Intake;
        $product->name = $request->name;
        $product->address = $request->address;
        $product->phone = $request->phone;
        $product->email = $request->email;
        $product->date_of_birth = $request->date_of_birth;

        $product->emergency = $request->emergency??'';
        $product->contact = $request->contact??'';
        $product->help = $request->help??'';
        
        if($request->hasfile('logo')){
            
            $file = $request->file('logo');
            $upload = 'public/img/';
            $filename = time().$file->getClientOriginalName();
            $file-> move(public_path($upload), $filename);
            // $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->logo=$upload.$filename;
        }

        $custom_fields = "";
        $custom_name = request('custom_name');
        $custom_value    = request('custom_value');

        $custom_field    = array();
        if (is_array(request("custom_value"))) {
            for ($a = 0; $a < count($custom_name); $a++) {
                if ($custom_value[$a] != "") {
                    $custom_field[] = array(
                        "custom_name" => $custom_name[$a],
                        "custom_value"    => $custom_value[$a],
                    );
                }
            }
            
        }
        
        $custom_fields = json_encode($custom_field);
        $product->custom_field = $custom_fields;
        $product->save();
        
        if (Auth::user()->id == 1) {
            return redirect()->route('intake.index')
            ->with(['type'=>'success', 'msg'=>'Intake form created successfully']);
        } 
        return redirect('/')->with('success','Data Submitted!');

    }
}
