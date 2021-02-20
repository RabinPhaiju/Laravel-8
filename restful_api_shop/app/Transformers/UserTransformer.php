<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'=>(int)$user->id,
            'name'=>(string)$user->name,
            'email'=>(string)$user->email,
            'verified'=>(int)$user->verified,
            'admin' => ($user->admin === 'true'),
            'image'=>url("img/{$user->image}"),
            'created_at'=> $user->created_at,
            'updated_at'=> $user->updated_at,
            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('users.show',$user->id),
                ],
            ]
        ];
    }
    public static function originalAttribute($index){
        $attributes =  [
            'id'=>'id',
            'name'=>'name',
            'email'=>'email',
            'verified'=>'verified',
            'image'=>'image',
            'admin' => 'admin',
            'created_at'=> 'created_at',
            'updated_at'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
