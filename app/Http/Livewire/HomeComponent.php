<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Photo;

class HomeComponent extends Component
{
    public function render()
    {
        $photos = Photo::orderBy('created_at','DESC')->get();
        return view('livewire.home-component',compact('photos'))->layout('layouts.base');
    }
}
