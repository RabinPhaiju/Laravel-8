<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("sellers",SellerController::class,['only'=>['index','show']]);
Route::apiResource("buyers",BuyerController::class,['only'=>['index','show']]);
// Route::apiResource("category",CategoryController::class,['except'=>['index','show']]);
Route::apiResource("category",CategoryController::class,['only'=>['index','show']]);
Route::apiResource("product",ProductController::class);
Route::apiResource("transaction",TransactionController::class);
Route::apiResource("users",UserController::class);