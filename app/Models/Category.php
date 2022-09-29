<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Photo;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function photos(){
        return $this->hasMany(Photo::class);
    }
    
}
