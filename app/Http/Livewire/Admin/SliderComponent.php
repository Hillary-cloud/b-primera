<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Slide;
use Illuminate\Support\Facades\File;

class SliderComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteSlide($id){
        $slide = Slide::find($id);
        $path = 'storage/slide-photos/'.$slide->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $slide->delete();
        session()->flash('message','slide removed successfully');
    }

    public function render()
    {
        $slides = Slide::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.slider-component',compact('slides'))->layout('layouts.base');
    }
}
