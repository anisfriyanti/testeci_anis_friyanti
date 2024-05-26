<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JabatanController;
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


Route::group(['prefix' => 'karyawan', 'as' => 'karyawan.'], function () {
    Route::get('/',[KaryawanController::class,'index']);
    Route::post('/',[KaryawanController::class,'store']);
    Route::put('/{id}',[KaryawanController::class,'update']);
    Route::delete('/{id}',[KaryawanController::class,'destroy']);
   
});
Route::group(['prefix' => 'level', 'as' => 'level.'], function () {
    Route::get('/',[LevelController::class,'index']);
    Route::post('/',[LevelController::class,'store']);
    Route::put('/{id}',[LevelController::class,'update']);
    Route::delete('/{id}',[LevelController::class,'destroy']);
   
});
Route::group(['prefix' => 'jabatan', 'as' => 'jabatan.'], function () {
    Route::get('/',[JabatanController::class,'index']);
    Route::post('/',[JabatanController::class,'store']);
    Route::put('/{id}',[JabatanController::class,'update']);
    Route::delete('/{id}',[JabatanController::class,'destroy']);
   
});
Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
    Route::get('/',[DepartmentController::class,'index']);
    Route::post('/',[DepartmentController::class,'store']);
    Route::put('/{id}',[DepartmentController::class,'update']);
    Route::delete('/{id}',[DepartmentController::class,'destroy']);
   
});

