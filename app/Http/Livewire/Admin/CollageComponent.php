<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Collage;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class CollageComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteCollage($id){
        $collage = collage::find($id);
        $path = 'storage/collage-photos/'.$collage->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $collage->delete();
        session()->flash('message','Collage removed successfully');
    }

    public function render()
    {
        $collages = Collage::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.collage-component',compact('collages'))->layout('layouts.base');
    }
}
