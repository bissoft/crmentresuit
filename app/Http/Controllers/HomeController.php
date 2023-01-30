<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intake;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function index()
    {
        $intake=Intake::all();
        return view('intake.index',compact('intake'));
    }

    public function intake(){
        
        return view('intake');
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
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->logo=$upload.$filename;
        }

        $product->save();
        return redirect('/')->with('success','Data Submitted!');

    }
}
