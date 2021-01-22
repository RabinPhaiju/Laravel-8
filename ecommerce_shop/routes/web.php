<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('login','login');
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);


Route::get('/',[ProductController::class,'index']);
Route::get('getproduct/{id}',[ProductController::class,'getproduct']);
Route::post('searchproduct',[ProductController::class,'searchproduct']);
Route::get('searchproduct',[ProductController::class,'index']);
Route::post('addToCart',[ProductController::class,'addToCart']);
Route::post('removeFromCart',[ProductController::class,'removeFromCart']);
Route::get('removeFromCart',[ProductController::class,'cart']);
Route::get('cart',[ProductController::class,'cart']);

Route::get('order',[ProductController::class,'order']);