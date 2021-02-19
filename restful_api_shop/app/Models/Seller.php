<?php

namespace App\Models;
use App\Models\User;

use App\Transformers\SellerTransformer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Seller extends User
{
    use HasFactory;

    public $transformer = SellerTransformer::class;
    public function products(){
        return $this->hasMany(Product::class);
    }
}
