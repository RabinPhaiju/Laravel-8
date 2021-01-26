<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function setGalleryAttribute($value){
        $this->attributes['gallery'] = str_replace('public/','',$value);
    }
}
