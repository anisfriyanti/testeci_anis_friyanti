<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

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

Route::get('currency',[CurrencyController::class, 'index']);

Route::get('karyawan',[KaryawanController::class,'index']);
Route::post('karyawan',[KaryawanController::class,'store']);
Route::put('karyawan/{id}',[KaryawanController::class,'update']);
Route::delete('karyawan/{id}',[KaryawanController::class,'destroy']);


Route::group(['prefix' => 'level', 'as' => 'level.'], function () {
    Route::get('/',[LevelController::class,'index']);
    Route::post('/',[LevelController::class,'store']);
    Route::put('/{id}',[LevelController::class,'update']);
    Route::delete('/{id}',[LevelController::class,'destroy']);
   
});

