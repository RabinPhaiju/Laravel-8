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
        ];
    }
}
