<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Buyer;

class BuyerTransformer extends TransformerAbstract
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
    public function transform(Buyer $buyer)
    {
        return [
            'identifier'=>(int)$buyer->id,
            'name'=>(string)$buyer->name,
            'email'=>(string)$buyer->email,
            'isVerified'=>(int)$buyer->verified,
            'creationDate'=> $buyer->created_at,
            'lastChange'=> $buyer->updated_at,
            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('buyers.show',$buyer->id),
                ],
                [
                    'rel'=>'buyers.categories',
                    'href'=>route('buyers.categories.index',$buyer->id),
                ],
                [
                    'rel'=>'buyers.transactions',
                    'href'=>route('buyers.transactions.index',$buyer->id),
                ],
                [
                    'rel'=>'buyers.products',
                    'href'=>route('buyers.products.index',$buyer->id),
                ],
                [
                    'rel'=>'buyers.sellers',
                    'href'=>route('buyers.sellers.index',$buyer->id),
                ],
                [
                    'rel'=>'buyers',
                    'href'=>route('users.show',$buyer->id),
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
