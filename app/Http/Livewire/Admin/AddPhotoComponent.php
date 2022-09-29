<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Photo;
// use Carbon\Carbon;
use App\Models\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddPhotoComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $slug;
    public $description;
    public $status;
    public $main_image;
    public $image = [];
    public $category_id;
    public $iteration;

    public function generateSlug(){
        $this->slug = Str::slug($this->title);
    }
    public function mount(){
        $this->status = "1";
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:photos',
            'description' => 'required',
            // 'status' => 'required',
            'main_image' => 'image',
            'category_id' => 'required',
        ]);
    }
    public function storePhoto(){
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:photos',
            'description' => 'required',
            // 'status' => 'required',
            'main_image' => 'image',
            'category_id' => 'required',
        ]);


        if ($this->main_image) {
            $photo = new Photo();
            $photo->title = $this->title;
            $photo->slug = $this->slug;
            $photo->description = $this->description;
            $photo->status = $this->status;

            $imageName = '-cover-'.time(). '.' .rand(1,1000).'.'. $this->main_image->extension();
            $this->main_image->storeAs('public/cover-photos',$imageName);
            $photo->main_image = $imageName;
            $photo->category_id = $this->category_id;
            $photo->save();
            session()->flash('message','Photo added successfully');
        };
        
        if ($this->image) {
            foreach($this->image as $file){
                $imagesName = '-photo-'.time().'.'.rand(1,1000).'.'.$file->extension();
                $file->storeAs('public/photos',$imagesName);
                Image::create([
                    'photo_id'=>$photo->id,
                    'image'=>$imagesName
                ]);
            };
        };
        $this->resetInput();
    }

    public function resetInput(){
        $this->title = null;
        $this->slug = null;
        $this->description = null;
        $this->category_id = null;
        $this->status = null;
        $this->main_image = null;
        $this->image = null;
        $this->iteration++;
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.add-photo-component',compact('categories'))->layout('layouts.base');
    }
}
