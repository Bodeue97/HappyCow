<?php

use App\Http\Controllers\ShoeController;
use App\Http\Controllers\SizeController;
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
    return view('index');
});



Route::resource('/admin/sizes', SizeController::class);

//Shoes routes
Route::get('/shoes', [ShoeController::class, 'index']);

Route::post('/shoes', [ShoeController::class, 'store']);

Route::get('/shoes/create', [ShoeController::class, 'create']);









