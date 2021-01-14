<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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
    return view('index');
    // return redirect('contact');
});

Route::get('/about/{name}', function ($name) {
    return view('about',['name'=>$name]);
});


Route::view("contact",'contact'); // cannot pass url to view

// Route::get("path",'controller file');
// Route::get("user",'User@index');
Route::get("user/{user}",[Users::class,'index_func']);

Route::post("userform",[Users::class,'getData']); 
Route::view("login",'userform'); 