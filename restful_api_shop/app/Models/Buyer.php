<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use User;

class Buyer extends User
{
    use HasFactory;
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
