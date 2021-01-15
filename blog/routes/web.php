<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\Subscriber;

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

Route::get('/logout', function () {
    if(session()->has('username')){
        session()->pull('username');
    }
    return redirect('login');
});

Route::get('/about/{name}', function ($name) {
    return view('about',['name'=>$name]);
});


Route::view("contact",'contact'); // cannot pass url to view

// Route::get("path",'controller file');
// Route::get("user",'User@index');
// Route::get("user/{user}",[Users::class,'index_func']);


Route::post("userform",[Users::class,'getData']); 

Route::view("loginForm",'userForm')->middleware('protectedLoginPage');

Route::post("loginAuth",[UserAuth::class,'userLogin'])->middleware('protectedLoginPage');

Route::get('/login', function () {
    if(session()->has('username')){
        return redirect('profile');
    }
    return view('login');
});

Route::get('/profile', function () {
    if(session()->has('username')){
        return view('profile');
    }
    return redirect('login');
});

Route::view("noaccess",'noaccess'); 

// protected page
Route::group(['middleware'=>['protectedPage']],function(){

    // Route::get("user/{user}",[Users::class,'index_func']);

    // Route::get("user/{user}",[Users::class,'fetchUserData']); // fetch directly

    Route::get("user/{user}",[Users::class,'fetchDBData']); // fetch using model
    
});

Route::get("collection",[Users::class,'fetchHttp']); // fetch from HTTP

//Flash Session
Route::get('/subscribe', function () {
    return view('subscribe');
});
Route::post("subscribe",[Subscriber::class,'Subscribe']);