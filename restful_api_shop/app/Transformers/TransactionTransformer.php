<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Transaction;

class TransactionTransformer extends TransformerAbstract
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
    public function transform(Transaction $transaction)
    {
        return [
            'id'=>(int)$transaction->id,
            'quantity'=>(int)$transaction->quantity,
            'buyer_id'=>(int)$transaction->buyer_id,
            'product_id'=>(int)$transaction->product_id,
            'created_at'=> $transaction->created_at,
            'updated_at'=> $transaction->updated_at,
            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('transactions.show',$transaction->id),
                ],
                [
                    'rel'=>'transaction.categories',
                    'href'=>route('transactions.categories.index',$transaction->id),
                ],
                [
                    'rel'=>'transaction.seller',
                    'href'=>route('transactions.sellers.index',$transaction->id),
                ],
                [
                    'rel'=>'buyer',
                    'href'=>route('buyers.show',$transaction->buyer_id),
                ],
                [
                    'rel'=>'product',
                    'href'=>route('products.show',$transaction->product_id),
                ],
            ]
        ];
    }
    public static function originalAttribute($index){
        $attributes =  [
            'id'=>'id',
            'quantity'=>'quantity',
            'buyer_id'=>'buyer_id',
            'product_id'=>'product_id',
            'created_at'=> 'created_at',
            'updated_at'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
