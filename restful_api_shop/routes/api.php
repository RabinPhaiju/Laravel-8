<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerTransactionController;
use App\Http\Controllers\BuyerProductController;
use App\Http\Controllers\BuyerSellerController;
use App\Http\Controllers\BuyerCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategorySellerController;
use App\Http\Controllers\CategoryTransactionController;
use App\Http\Controllers\CategoryBuyerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\ProductBuyerController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductBuyerTransactionController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerTransactionController;
use App\Http\Controllers\SellerCategoryController;
use App\Http\Controllers\SellerBuyerController;
use App\Http\Controllers\SellerProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionCategoryController;
use App\Http\Controllers\TransactionSellerController;
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

Route::middleware('auth:api/*')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){

Route::apiResource("sellers",SellerController::class,['only'=>['index','show']]);
Route::apiResource("sellers.transactions",SellerTransactionController::class,['only'=>['index','show']]);
Route::apiResource("sellers.categories",SellerCategoryController::class,['only'=>['index','show']]);
Route::apiResource("sellers.buyers",SellerBuyerController::class,['only'=>['index','show']]);
Route::apiResource("sellers.products",SellerProductController::class,['except'=>['create','show','edit']]);

Route::apiResource("buyers",BuyerController::class,['only'=>['index','show']]);
Route::apiResource("buyers.sellers",BuyerSellerController::class,['only'=>['index','show']]);
Route::apiResource("buyers.transactions",BuyerTransactionController::class,['only'=>['index']]);
Route::apiResource("buyers.products",BuyerProductController::class,['only'=>['index']]);
Route::apiResource("buyers.categories",BuyerCategoryController::class,['only'=>['index']]);

Route::apiResource("categories",CategoryController::class,['except'=>['index']]);
Route::apiResource("categories.products",CategoryProductController::class,['only'=>['index']]);
Route::apiResource("categories.sellers",CategorySellerController::class,['only'=>['index']]);
Route::apiResource("categories.transactions",CategoryTransactionController::class,['only'=>['index']]);
Route::apiResource("categories.buyers",CategoryBuyerController::class,['only'=>['index']]);

Route::apiResource("products",ProductController::class,['except'=>['index']]);
Route::apiResource("products.transactions",ProductTransactionController::class,['only'=>['index']]);
Route::apiResource("products.buyers",ProductBuyerController::class,['only'=>['index']]);
Route::apiResource("products.buyers.transactions",ProductBuyerTransactionController::class,['only'=>['store']]);
Route::apiResource("products.categories",ProductCategoryController::class,['only'=>['index','update','destroy']]);

Route::apiResource("transactions",TransactionController::class,['only'=>['index','show']]);
Route::apiResource("transactions.categories",TransactionCategoryController::class,['only'=>['index']]);
Route::apiResource("transactions.sellers",TransactionSellerController::class,['only'=>['index']]);

Route::apiResource("users",UserController::class,['except'=>['store']]);
Route::get('me',[UserController::class,'me']);
});

Route::get('users/verify/{token}',[UserController::class,'verify'])->name('verify');
Route::get('users/{user}/resend',[UserController::class,'resend'])->name('resend');

Route::post('login',[UserController::class,'login']);
Route::post('signup',[UserController::class,'signup']);
Route::get('products',[ProductController::class,'index']);
Route::get('categories',[CategoryController::class,'index']);

Route::get('login',[UserController::class,'login'])->name('login');