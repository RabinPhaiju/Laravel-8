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
            'identifier'=>(int)$transaction->id,
            'quantity'=>(int)$transaction->quantity,
            'buyer'=>(int)$transaction->buyer_id,
            'product'=>(int)$transaction->product_id,
            'creationDate'=> $transaction->created_at,
            'lastChange'=> $transaction->updated_at,
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
            'identifier'=>'id',
            'quantity'=>'quantity',
            'buyer'=>'buyer_id',
            'product'=>'product_id',
            'creationDate'=> 'created_at',
            'lastChange'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
