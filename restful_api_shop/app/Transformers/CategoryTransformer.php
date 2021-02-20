<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Category;

class CategoryTransformer extends TransformerAbstract
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
    public function transform(Category $category)
    {
        return [
            'id'=>(int)$category->id,
            'name'=>(string)$category->name,
            'description'=>(string)$category->description,
            'created_at'=> $category->created_at,
            'updated_at'=> $category->updated_at,

            'links'=>[
                [
                'rel'=>'self',
                'href'=>route('categories.show',$category->id),
                ],
                [
                    'rel'=>'category.buyers',
                    'href'=>route('categories.buyers.index',$category->id),
                ],
                [
                    'rel'=>'category.products',
                    'href'=>route('categories.products.index',$category->id),
                ],
                [
                    'rel'=>'category.sellers',
                    'href'=>route('categories.sellers.index',$category->id),
                ],
                [
                    'rel'=>'category.transactions',
                    'href'=>route('categories.transactions.index',$category->id),
                ],

            ]
        ];
    }
    public static function originalAttribute($index){
        $attributes =  [
            'id'=>'id',
            'name'=>'name',
            'description'=>'description',
            'created_at'=> 'created_at',
            'updated_at'=> 'updated_at',
        ];
        return isset($attributes[$index])?$attributes[$index]:null;
    }
}
