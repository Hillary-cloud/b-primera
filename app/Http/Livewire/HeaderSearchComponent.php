<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Photo;
use App\Models\Category;

class HeaderSearchComponent extends Component
{
    public $search = '';
    public function render()
    {
        $categories = Category::all();
        $photos = Photo::join('categories','categories.id', '=' , 'photos.category_id')
        ->select('photos.*','categories.name')
        ->where('categories.name', 'like', '%'.$this->search.'%')
        ->orderBy('created_at','DESC')->get();
        return view('livewire.header-search-component',compact('categories','photos'))->layout('layouts.base');
    }
}
