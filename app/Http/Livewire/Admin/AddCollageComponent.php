<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Collage;

class AddCollageComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $status;
    public $collage_image;
    public $iteration;

    public function mount(){
        $this->status = '1';
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            // 'name' => 'required',
            // 'status' => 'required',
            'collage_image' => 'image',
        ]);
    }

    public function storeCollage(){
        $this->validate([
            // 'name' => 'required',
            // 'status' => 'required',
            'collage_image' => 'image',
    
        ]);
        $collage = new Collage();
        $collage->name = $this->name; 
        $collage->status = $this->status; 
        $imageName = '-collage-'.time(). '.' .rand(1,1000).'.'. $this->collage_image->getClientOriginalExtension();
        $this->collage_image->storeAs('public/collage-photos',$imageName);
        $collage->collage_image = $imageName;
        $collage->save();
        session()->flash('message','Collage added successfully');

        $this->resetInput();
    }

    
    public function resetInput(){
        $this->name = null;
        $this->collage_image = null;
        $this->iteration++;
    }

    public function render()
    {
        return view('livewire.admin.add-collage-component')->layout('layouts.base');
    }
}
