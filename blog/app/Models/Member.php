<?php

namespace App\Models;
use App\Models\User;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function getBloodtype1(){
        return $this->hasOne(User::class);
        // Inverse of hasOne
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'foreign_key');
        return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }

    public function getBloodtype2(){
        return $this->hasMany(User::class);
        return $this->hasMany(User::class)->where('location', 'Bhaktapur');
        return $this->hasMany(User::class, 'foreign_key');   
        return $this->hasMany(User::class, 'foreign_key', 'local_key');
        //Inverse
        return $this->belongsTo(User::class);
        return $this->belongsTo(User::class, 'foreign_key');
        return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
    }

    public function getBloodtype3(){
        // return $this->belongsToMany(User::class, 'member_user','member_id', 'user_id');
        return $this->belongsToMany(User::class, 'member_user','member_id', 'user_id')
        ->withPivot('created_at');
    }

    public function getBloodtype4(){
        return $this->hasOneThrough( User::class,Student::class);
    }
    public function getBloodtype5(){
        return $this->hasManyThrough( User::class,Student::class);
        return $this->hasManyThrough( User::class,Student::class,'id','id');

    }
}
