<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Seller extends User
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class);
    }
}
