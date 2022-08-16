<?php

use App\Http\Controllers\ProductController;
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

Route::get('/about', function (){
    return view('about');
});


Route::resource('/admin/sizes', SizeController::class);

Route::resource('/shoes', ShoeController::class);

//Products routes

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/create', [ProductController::class, 'create']);

Route::post('/products', [ProductController::class, 'store']);

Route::post('/products/search', [ProductController::class, 'search']);

Route::put('/products/{shoe_id}/{size_id}', [ProductController::class, 'update']);





