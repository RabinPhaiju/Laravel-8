<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategoryTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $transactions = $category->products()
        ->whereHas('transactions')
        ->with('transactions')
        ->get()
        ->pluck('transactions')
        ->collapse();
        if($transactions){
            return $this->showAll($transactions);
        }else{
            return $this->errorResponse('Not found',404);
        }
    }
}