<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoeController;
use App\Http\Controllers\ShopController;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

//auth routes
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'store']);
Route::get('/logout',[ HomeController::class, 'logout'])->middleware('auth');
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'read']);


//size routes
Route::resource('/sizes', SizeController::class)->middleware('admin');

//shoe routes
Route::resource('/shoes', ShoeController::class)->middleware('admin');

//product routes
Route::resource('/products', ProductController::class)->middleware('admin');
Route::post('/products/search', [ProductController::class, 'search'])->middleware('admin');
Route::put('/products/{shoe_id}/{size_id}', [ProductController::class, 'update'])->middleware('admin');

//shop routes
Route::get('/shop', [ShopController::class, 'index']);

Route::get('/shop/{brand}', [ShopController::class, 'brand']);

Route::get('/shop/model/{model}', [ShopController::class, 'model']);

Route::get('/shop/{shoe_id}/{size_id}', [ShopController::class, 'add']);

//cart routes

Route::get('/cart', [HomeController::class, 'showCart']);






