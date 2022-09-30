<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slide;
use Livewire\WithFileUploads;

class EditSliderComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $new_slide_image;
    public $status;
    public $slide_id;
    public $slide_image;

    public function mount($name){
        $this->name = $name;
        $slide = Slide::where('name',$this->name)->first();
        $this->status = $slide->status;
        $this->slide_id = $slide->id;
        $this->slide_image = $slide->slide_image;


    }

    public function updateSlide(){
        $slide = Slide::find($this->slide_id);
        $slide->name = $this->name;
        $slide->status = $this->status;
        if ($this->new_slide_image) {
            $imageName = '-slide-'.time(). '.' .rand(1,1000).'.'. $this->new_slide_image->extension();
            $this->new_slide_image->storeAs('public/slide-photos',$imageName);
            $slide->slide_image = $imageName;
        }
        $slide->save();
        session()->flash('message','Slide updated successfully');

    }

    public function render()
    {
        return view('livewire.admin.edit-slider-component')->layout('layouts.base');
    }
}
