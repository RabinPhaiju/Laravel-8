<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Product;

class ProductTransformer extends TransformerAbstract
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
    public function transform(Product $product)
    {
        return [
            'identifier'=>(int)$product->id,
            'title'=>(string)$product->name,
            'details'=>(string)$product->description,
            'stock'=>(int)$product->quantity,
            'status'=>(string)$product->status,
            'picture'=>url("img/{$product->image}"),
            'seller'=>(int)$product->seller_id,
            
            'creationDate'=> $product->created_at,
            'lastChange'=> $product->updated_at,
            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('products.show',$product->id),
                ],
                [
                    'rel'=>'product.buyers',
                    'href'=>route('products.buyers.index',$product->id),
                ],
                [
                    'rel'=>'product.categories',
                    'href'=>route('products.categories.index',$product->id),
                ],
                [
                    'rel'=>'product.transactions',
                    'href'=>route('products.transactions.index',$product->id),
                ],
                [
                    'rel'=>'seller',
                    'href'=>route('sellers.show',$product->seller_id),
                ],
            ]
        ];
    }
    public static function originalAttribute($index){
        $attributes =  [
            'identifier'=>'id',
            'title'=>'name',
            'details'=>'description',
            'stock'=>'quantity',
            'status'=>'status',
            'picture'=> 'image',
            'seller'=> 'seller_id',
            'creationDate'=> 'created_at',
            'lastChange'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
