<?php

use App\Http\Controllers\CurrencyController;
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
    Route::get('/{id}',[LevelController::class, 'show']);
  
   
});