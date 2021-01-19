<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// Contact Route
Route::get('contact',[ContactController::class,'index']);
Route::get('contact/{id}',[ContactController::class,'getData']);
Route::post('contact/add',[ContactController::class,'addData']);
Route::put('contact/update',[ContactController::class,'updateData']);
Route::delete('contact/delete/{id}',[ContactController::class,'deleteData']);
Route::get('contact/search/{name}',[ContactController::class,'searchData']);