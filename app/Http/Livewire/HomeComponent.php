<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Slide;
use App\Models\Collage;
use Livewire\WithPagination;

class HomeComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $slides = Slide::where('status',1)->get();
        $collages = Collage::where('status', 1)->orderBy('created_at','DESC')->paginate(1);
        $photos = Photo::orderBy('created_at','DESC')->get();
        return view('livewire.home-component',compact('photos','slides','collages'))->layout('layouts.base');
    }
}
