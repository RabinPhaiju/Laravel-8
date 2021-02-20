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
            'id'=>(int)$product->id,
            'name'=>(string)$product->name,
            'description'=>(string)$product->description,
            'quantity'=>(int)$product->quantity,
            'status'=>(string)$product->status,
            'image'=>url("img/{$product->image}"),
            'seller_id'=>(int)$product->seller_id,
            
            'created_at'=> $product->created_at,
            'updated_at'=> $product->updated_at,
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
            'id'=>'id',
            'name'=>'name',
            'description'=>'description',
            'quantity'=>'quantity',
            'status'=>'status',
            'image'=> 'image',
            'seller_id'=> 'seller_id',
            'created_at'=> 'created_at',
            'updated_at'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
