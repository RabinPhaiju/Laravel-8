<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Seller;

class SellerTransformer extends TransformerAbstract
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
    public function transform(Seller $seller)
    {
        return [
            'identifier'=>(int)$seller->id,
            'name'=>(string)$seller->name,
            'email'=>(string)$seller->email,
            'isVerified'=>(int)$seller->verified,
            'creationDate'=> $seller->created_at,
            'lastChange'=> $seller->updated_at,
        ];
    }
    public static function originalAttribute($index){
        $attributes =  [
            'identifier'=>'id',
            'name'=>'name',
            'email'=>'email',
            'isVerified'=>'verified',
            'creationDate'=> 'created_at',
            'lastChange'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
