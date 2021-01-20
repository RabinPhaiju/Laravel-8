<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
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

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    // Content Route
    Route::apiResource("content",ContentController::class);

    // Contact Route
    Route::get('contact',[ContactController::class,'index']);
    Route::get('contact/{id}',[ContactController::class,'getData']);
    Route::post('contact/add',[ContactController::class,'addData']);
    Route::put('contact/update',[ContactController::class,'updateData']);
    Route::delete('contact/delete/{id}',[ContactController::class,'deleteData']);
    Route::get('contact/search/{name}',[ContactController::class,'searchData']);
    });

    // User Route
    Route::get('user',[UserController::class,'index']);
    Route::get('user/{id}',[UserController::class,'getData']);
    Route::put('user/update',[UserController::class,'updateData']);
    Route::delete('user/delete/{id}',[UserController::class,'deleteData']);
    Route::get('user/search/{name}',[UserController::class,'searchData']);
    Route::post('user/fileUpload',[UserController::class,'fileUpload']);

// User Route
Route::post('login',[UserController::class,'login']);
Route::post('signup',[UserController::class,'signup']);