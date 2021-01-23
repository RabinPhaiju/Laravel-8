<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Help;
use App\Http\Livewire\Find;
use App\Http\Livewire\UploadFile;
use App\Http\Livewire\Multiplefileupload;
use App\Http\Livewire\Users;

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
    return view('layout');
});

Route::get('/home/{name}',Home::class);
Route::get('/help/{topic?}',Help::class);
Route::get('/find',Find::class);
Route::get('/uploadFile',UploadFile::class);
Route::get('/multiplefileupload',Multiplefileupload::class);

Route::get('/users',Users::class);