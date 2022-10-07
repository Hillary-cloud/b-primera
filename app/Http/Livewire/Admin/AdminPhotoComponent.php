<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class AdminPhotoComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function deletePhoto($id){
        $photo = Photo::findOrfail($id);
        $path = 'storage/cover-photos/'.$photo->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $photo->delete();
        session()->flash('message','Photo removed successfully');
    }

    public function render()
    {
        $categories = Category::all();
        $photos = Photo::join('categories','categories.id', '=' , 'photos.category_id')
        ->select('photos.*','categories.name')
        ->where('title', 'like', '%'.$this->search.'%')
        ->orWhere('categories.name', 'like', '%'.$this->search.'%')
        ->orderBy('created_at','DESC')
        ->paginate(15);
        return view('livewire.admin.admin-photo-component',compact('photos','categories'))->layout('layouts.base');
    }
}
