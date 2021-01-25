<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::get('oneToOne', [UserController::class, 'index']);
Route::post('insertOneToOne', [UserController::class, 'insertoneToOne']);
Route::post('updateOneToOne', [UserController::class, 'updateOneToOne']);
Route::get('deleteOneToOne', [UserController::class, 'deleteOneToOne']);

Route::get('oneToMany', [UserController::class, 'getOneToMany']);
Route::post('insertOneToMany', [UserController::class, 'insertOneToMany']);
Route::post('updateOneToMany', [UserController::class, 'updateOneToMany']);
Route::get('deleteOneToMany/{id}', [UserController::class, 'deleteOneToMany']);

Route::get('manyToMany', [UserController::class, 'getManyToMany']);
Route::post('insertManyToMany', [UserController::class, 'insertManyToMany']);
Route::post('updateManyToMany', [UserController::class, 'updateManyToMany']);
Route::get('deleteManyToMany/{id}', [UserController::class, 'deleteManyToMany']);
