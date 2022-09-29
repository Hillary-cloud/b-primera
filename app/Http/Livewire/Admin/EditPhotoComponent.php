<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Photo;
// use Carbon\Carbon;
use App\Models\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EditPhotoComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $description;
    public $status;
    public $new_main_image;
    public $images = [];
    public $category_id;
    public $photo_slug;
    public $photo_id;
    public $main_image;


    public function mount($photo_slug){
        $this->photo_slug = $photo_slug;
        $photo = Photo::where('slug',$this->photo_slug)->first();
        $this->photo_id = $photo->id;
        $this->title = $photo->title;
        $this->slug = $photo->slug;
        $this->description = $photo->description;
        $this->status = $photo->status;
        $this->new_main_image = $photo->new_main_image;
        $this->images = $photo->images;
        $this->main_image = $photo->main_image;
        $this->category_id = $photo->category_id;
    }
    public function generateSlug(){
        $this->slug = Str::slug($this->title);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            // 'slug' => 'required|unique:photos',
            'description' => 'required',
            'status' => 'required',
            // 'new_main_image' => 'image|max:1024',
            'category_id' => 'required',
        ]);
    }
    public function updatePhoto(){
        $this->validate([
            'title' => 'required',
            // 'slug' => 'required|unique:photos',
            'description' => 'required',
            'status' => 'required',
            // 'new_main_image' => 'image|max:1024',
            'category_id' => 'required',
        ]);
        $photo = Photo::find($this->photo_id);
        $photo->title = $this->title;
        $photo->slug = $this->slug;
        $photo->description = $this->description;
        $photo->status = $this->status;
        
        
        if ($this->new_main_image) {
            $imageName = '-cover-'.time(). '.' .rand(1,1000).'.'. $this->new_main_image->extension();
            $this->new_main_image->storeAs('public/cover-photos',$imageName);
            $photo->main_image = $imageName;
        
            // $photo->category_id = $this->category_id;
            // $photo->save();
            // session()->flash('message','Photo updated successfully');
        };

        if ($this->images) {
            foreach($this->images as $file){
                // if (File::exists('public/cover-photos/'.$photo->main_image)) {
                //     File::delete('public/photos/'.$photo->image);
                // }
                $imagesName = '-photo-'.time().'.'.rand(1,1000).'.'.$file->extension();
                $file->storeAs('public/photos',$imagesName);
                Image::create([
                    'photo_id'=>$photo->id,
                    'image'=>$imagesName
                ]);
            };
        };
        $photo->category_id = $this->category_id;
        $photo->save();
        session()->flash('message','Photo updated successfully');
    }
    public function render()
    {
        $categories = Category::all();
        $photo = Photo::all();
        return view('livewire.admin.edit-photo-component',compact('categories','photo'))->layout('layouts.base');
    }
}
