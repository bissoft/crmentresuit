<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Response;

class GetFileController extends Controller
{
    public function getFile()
    {
        $id = request('id');
    
        // dd($task);
         //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). '/files/documents/'.$id;
        $ext= \File::extension(public_path(). '/files/documents/'.$id);
         $headers = array(
                       'Content-Type: application/'.$ext,
                    );
    
       //   return Response::download($file, $id, $headers);//for download file
         return Response::file($file);
        }
}
