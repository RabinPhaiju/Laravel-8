<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $table='users'; // defined for specify
    // public $timestamps=false;

    // Accessor
    public function getFirstnameAttribute($value){
        return ucFirst($value);
    }

    public function getEmailAttribute($value){
        return ucFirst($value);
    }

    public function getLocationAttribute($value){
        $len = strlen($value);
        if(substr($value,$len-5,$len)=="Nepal"){
            return $value;
        }else{
        return ucFirst($value.", Nepal");
        }
    }

    // Mutator
    public function setFirstnameAttribute($value){
        $this->attributes['firstname'] = "Mr ".$value;
    }

    public function setLocationAttribute($value){
        $this->attributes['location'] = $value.", Nepal";
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
