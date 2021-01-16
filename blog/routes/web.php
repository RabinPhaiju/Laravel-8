<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\Subscriber;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\Members;

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

// Aggregate methods
Route::get('/member/operations',[Members::class,'operations']);

// Query Builder
Route::get('memberList',[Members::class,'dbOperation']);
Route::post('addMember',[Members::class,'dbInsert']);
Route::get('member/delete/{id}',[Members::class,'dbDelete']);
Route::get('member/update/{id}',[Members::class,'dbGetId']);
Route::post('member/updateMember',[Members::class,'dbUpdate']);

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
        return redirect('profile/en');
    }
    return view('login');
});

Route::get('/profile/{lang}', function ($lang) {
    App::setlocale($lang);
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


// Delete Route
Route::get("user/delete/{id}",[Users::class,'deleteUserDB']);

// Edit Route
Route::get("user/editUserDB/{id}",[Users::class,'editUserDB']);
Route::view("user/editUser","editUserDB");
Route::post("user/updateUser",[Users::class,'updateUserDB']);


Route::post("profile/addUser",[Users::class,'addDBData']);

Route::get("collection",[Users::class,'fetchHttp']); // fetch from HTTP

//Flash Session
Route::get('/subscribe', function () {
    return view('subscribe');
});
Route::post("subscribe",[Subscriber::class,'Subscribe']);

// File Upload
Route::view("uploadFile",'uploadFile');
Route::post("uploadFile",[FileUpload::class,'fileUpload']);