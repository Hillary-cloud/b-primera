<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slide;

class SliderComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $slides = Slide::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.slider-component',compact('slides'))->layout('layouts.base');
    }
}
