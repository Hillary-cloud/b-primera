<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Category;
use Livewire\WithPagination;
class PhotoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function render()
    {
        $categories = Category::all();
        $photos = Photo::join('categories','categories.id', '=' , 'photos.category_id')
        ->select('photos.*','categories.name')
        ->where('categories.name', 'like', '%'.$this->search.'%')
        ->orderBy('created_at','DESC')
        ->paginate(9);
        return view('livewire.photo-component',compact('photos','categories'))->layout('layouts.base');
    }
}
