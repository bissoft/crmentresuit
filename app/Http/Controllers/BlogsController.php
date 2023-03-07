<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function blogList()
    {
        $b_4 = Blog::orderBy("created_at","DESC")->limit(4)->get();
        $blog = Blog::paginate(8);
        return view('blogs-list',compact('b_4','blog'));
    }
    public function blogDetail($slug)
    {
        $blog=Blog::where('slug',$slug)->get()->first();
        $b_4 = Blog::orderBy("created_at","DESC")->limit(4)->get();
        return view('blog-detail',compact('blog','b_4'));
    }



//event seciton start here..................................................................
public function blog_list()
{
    // $role = User::with('roles')->where('id',Auth::user()->id)->get()->first();
    // if($role->roles[0]->name != "Admin"){
    //     return redirect(url('/'))->with(["type"=>"danger","msg"=>"You Are not authorized to visit this link"]);
    // }
   

    if(request()->has('delete')){ 
        $id = request('delete');
        $blogs = Blog::destroy($id);
        return redirect(url('/').'/blog-list')->with(["type"=>"danger","msg"=>"Record Deleted successfully."]);
    }
    $blogs= Blog::get()->all();
    return view('admin.blog.blog-list',compact('blogs'));
}

//........create bloge............................................
public function blog_create()
{
    // $role = User::with('roles')->where('id',Auth::user()->id)->get()->first();
    // if($role->roles[0]->name != "Admin"){
    //     return redirect(url('/'))->with(["type"=>"danger","msg"=>"You Are not authorized to visit this link"]);
    // }
    if(request()->isMethod('post')){
        // dd(request()->all());
        if(request()->has('edit')){
            request()->validate([
                'title' => 'required',
                'description'   =>  'required',
                'detail'   =>  'required',
            ]);
        }else{
            request()->validate([
                'title' => 'required',
                'description'   =>  'required',
                'detail'   =>  'required',
                'image'   =>  'required',
            ]);
        }
        $id = request('id');
        $title = request('title');
        $description = request('description');
        $detail = request('detail');
        $old_image = request('old_image');
        $image = '';
        if (request()->hasfile('image')) {
            $image = request()->file('image');
            $upload = 'Images/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $image = $upload . $filename;
        }
        if(empty($image))
        {
            $image = $old_image ?? '';
        }
        $slug = Str::slug($title);
        $f =Blog::updateOrCreate([
            'id' => $id],[
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'detail' => $detail,
                'image' => $image,
            ]);
        if(request()->has('edit')){
            return redirect(url('/').'/blog-create?edit='.$f->id)->with(["type"=>"success","msg"=>"Your $f->title Updated successfully"]);
        }else{
            return redirect(url('/').'/blog-create')->with(["type"=>"success","msg"=>"Your $f->title Created successfully"]);
        }
    }
    $blogs = '';
    if(request()->has('edit')){
        $id = request('edit');
        $blogs= Blog::where('id',$id)->get()->first();
    }
    return view('admin.blog.blog-create',compact('blogs'));
}


}
