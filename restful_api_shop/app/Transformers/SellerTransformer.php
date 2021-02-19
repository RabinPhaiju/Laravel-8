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
            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('sellers.show',$seller->id),
                ],
                [
                    'rel'=>'sellers.categories',
                    'href'=>route('sellers.categories.index',$seller->id),
                ],
                [
                    'rel'=>'sellers.transactions',
                    'href'=>route('sellers.transactions.index',$seller->id),
                ],
                [
                    'rel'=>'sellers.products',
                    'href'=>route('sellers.products.index',$seller->id),
                ],
                [
                    'rel'=>'sellers.buyers',
                    'href'=>route('sellers.buyers.index',$seller->id),
                ],
                [
                    'rel'=>'sellers',
                    'href'=>route('users.show',$seller->id),
                ],
            ]
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
