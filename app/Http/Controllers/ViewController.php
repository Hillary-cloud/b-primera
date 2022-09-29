<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Image;

class ViewController extends Controller
{
    public function viewPhoto($slug){
        $photo = Photo::where('slug',$slug)->first();
        if(!$photo) abort(404);
        $images = Image::where('photo_id',$photo->id)->get();
        return view('admin.view-photo',compact('photo','images'));
    }
}
