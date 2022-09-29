<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('message','Category deleted successfully');
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-category-component',compact('categories'))->layout('layouts.base');
    }
}
