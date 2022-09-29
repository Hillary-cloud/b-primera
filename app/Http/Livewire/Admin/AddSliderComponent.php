<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slide;
use Livewire\WithFileUploads;

class AddSliderComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $status;
    public $slide_image;
    public $iteration;

    public function mount(){
        $this->status = '1';
    }

    public function storeSlide(){
        $slide = new Slide();
        $slide->name = $this->name; 
        $slide->status = $this->status; 
        $imageName = '-slide-'.time(). '.' .rand(1,1000).'.'. $this->slide_image->extension();
        $this->slide_image->storeAs('public/slide-photos',$imageName);
        $slide->slide_image = $imageName;
        $slide->save();
        session()->flash('message','Slide added successfully');

        $this->resetInput();
    }

    
    public function resetInput(){
        $this->name = null;
        $this->slide_image = null;
        $this->iteration++;
    }

    public function render()
    {
        return view('livewire.admin.add-slider-component')->layout('layouts.base');
    }
}
