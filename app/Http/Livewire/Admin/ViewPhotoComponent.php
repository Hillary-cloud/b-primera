<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Image;

class ViewPhotoComponent extends Component
{
    public $title;
    public $slug;
    public $status;
    public $description;
    public $photo_id;
    public $main_image;
    public $images = [];
    public $image;
    public $photo;

    public function mount($slug){
        //for route model binding
        $this->slug = $slug;
        //from the database
        // $this->photo_id = $photo->id;
        $photo = Photo::where('slug',$this->slug)->first();
        $images = Image::where('photo_id',$photo->id)->get();
        $this->photo_id = $photo->id;
        // $this->title = $photo->title;
        // $this->slug = $photo->slug;
        // $this->status = $photo->status;
        // $this->description = $photo->description;
        $this->main_image = $photo->main_image;
        // $this->image = $images->image;
    }

    public function render()
    {
        $photo = Photo::where('slug',$this->slug)->first();
        $images = Image::where('photo_id',$photo->id)->get();
        return view('livewire.admin.view-photo-component',compact('photo','images'))->layout('layouts.base');
    }
}