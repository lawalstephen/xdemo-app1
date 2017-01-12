<?php

namespace App\Http\Controllers;
use App\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    public function index(Request $request)
    {
    	If($request->hasFile('ximage'))
    	{
    		if($request->file('ximage')->isValid())
    		{
    			$filePath = $this->uploadImage($request);
    			return "Success";
    		}
    	}
    }

    public function uploadImage(Request $request)
    {
    	$title = $request->title;
    	$path = $request->ximage->store('uploads');
       $myUpload = new Upload();
       $myUpload->title = $title;
       $myUpload->path = $path;
       $myUpload->save();

       return $path;
}
}
