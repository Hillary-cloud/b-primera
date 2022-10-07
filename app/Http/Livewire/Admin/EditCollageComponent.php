<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Collage;
use Livewire\WithFileUploads;

class EditCollageComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $new_collage_image;
    public $status;
    public $collage_id;
    public $collage_image;

    public function mount($name){
        $this->name = $name;
        $collage = Collage::where('name',$this->name)->first();
        $this->status = $collage->status;
        $this->collage_id = $collage->id;
        $this->collage_image = $collage->collage_image;


    }

    public function updateCollage(){
        $collage = Collage::find($this->collage_id);
        $collage->name = $this->name;
        $collage->status = $this->status;
        if ($this->new_collage_image) {
            $imageName = '-collage-'.time(). '.' .rand(1,1000).'.'. $this->new_collage_image->extension();
            $this->new_collage_image->storeAs('public/collage-photos',$imageName);
            $collage->collage_image = $imageName;
        }
        $collage->save();
        session()->flash('message','Collage updated successfully');

    }
    
    public function render()
    {
        return view('livewire.admin.edit-collage-component')->layout('layouts.base');
    }
}
