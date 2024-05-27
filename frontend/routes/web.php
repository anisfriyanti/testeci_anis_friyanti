<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JabatanController;
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


Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
    Route::get('/',[CurrencyController::class, 'index']);
    Route::post('/',[CurrencyController::class, 'result']);
  
   
});
Route::group(['prefix' => 'level', 'as' => 'level.'], function () {
    Route::get('/',[LevelController::class, 'index']);
    Route::post('/',[LevelController::class, 'add']);
    Route::post('/edit',[LevelController::class, 'edit']);
    Route::get('/delete/{id}',[LevelController::class, 'delete']);
    // Route::get('/{id}',[LevelController::class, 'show']);
    Route::get('/select',[LevelController::class, 'select']);
    
  
   
});
Route::group(['prefix' => 'department', 'as' => 'department.'], function () {
    Route::get('/',[DepartmentController::class, 'index']);
    Route::post('/',[DepartmentController::class, 'add']);
    Route::post('/edit',[DepartmentController::class, 'edit']);
    Route::get('/delete/{id}',[DepartmentController::class, 'delete']);
    // Route::get('/{id}',[DepartmentController::class, 'show']);
  
   
});
Route::group(['prefix' => 'jabatan', 'as' => 'jabatan.'], function () {
    Route::get('/',[JabatanController::class, 'index']);
    Route::post('/',[JabatanController::class, 'add']);
    Route::post('/edit',[JabatanController::class, 'edit']);
    Route::get('/delete/{id}',[JabatanController::class, 'delete']);

  
   
});