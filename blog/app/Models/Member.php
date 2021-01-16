<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function getBloodtype1(){
        return $this->hasOne('App\Models\User');
    }

    public function getBloodtype2(){
        // return $this->hasMany('App\Models\User');
        return $this->hasMany('App\Models\User')->where('location', 'Bhaktapur');
    }
}
