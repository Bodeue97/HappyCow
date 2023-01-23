<?php

use App\Http\Controllers\ApplicationController;
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
//Admin routes
Route::get('/admin_roles', [\App\Http\Controllers\AdminController::class, 'assignRoles'])->middleware('admin');
Route::get('/admin_roles_edit/{user_id}', [\App\Http\Controllers\AdminController::class, 'assignRolesEdit'])->middleware('admin');
Route::put('admin_roles_save', [\App\Http\Controllers\AdminController::class, 'saveRole'])->middleware('admin');
//


Route::get('/', [HomeController::class, 'index']);



//Application routes
Route::get('/application_create', [App\Http\Controllers\ApplicationController::class, 'create'])->middleware('user');
Route::post('/application_store', [ApplicationController::class, 'store'])->middleware('user');
Route::get('/verify_applications', [ApplicationController::class, 'verifyApplications'])->middleware('boss');
Route::put('/verify_applications/{id}', [ApplicationController::class, 'confirmVerify'])->middleware('boss');
Route::delete('/verify_applications/{id}', [ApplicationController::class, 'delete'])->middleware('boss');
Route::get('/show_applications', [ApplicationController::class, 'show'])->middleware('user');
Route::put('/order_cattle/{id}', [ApplicationController::class, 'orderCattle'])->middleware('user');
Route::get('/show_my_orders', [ApplicationController::class, 'reservedApplications'])->middleware('user');





//Transport routes
Route::get('/create_carrier', [\App\Http\Controllers\TransportController::class, 'addCarrier'])->middleware('transport');
Route::post('/create_carrier', [\App\Http\Controllers\TransportController::class, 'storeCarrier'])->middleware('transport');
Route::get('/show_carriers', [\App\Http\Controllers\TransportController::class, 'showCarriers'])->middleware('transport');
Route::delete('/carrier_delete/{id}', [\App\Http\Controllers\TransportController::class, 'delete'])->middleware('transport');























//auth routes
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'store']);
Route::get('/logout',[ HomeController::class, 'logout'])->middleware('auth');
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'read']);





//
////size routes
//Route::resource('/sizes', SizeController::class)->middleware('admin');
//
////shoe routes
//Route::resource('/shoes', ShoeController::class)->middleware('admin');
//
////product routes
//Route::resource('/products', ProductController::class)->middleware('admin');
//Route::post('/products/search', [ProductController::class, 'search'])->middleware('admin');
//Route::put('/products/{shoe_id}/{size_id}', [ProductController::class, 'update'])->middleware('admin');
//
////shop routes
//Route::get('/shop', [ShopController::class, 'index']);
//
//Route::get('/shop/{brand}', [ShopController::class, 'brand']);
//
//Route::get('/shop/model/{model}', [ShopController::class, 'model']);
//
//Route::get('/shop/{shoe_id}/{size_id}', [ShopController::class, 'add']);
//
////cart routes
//
//Route::get('/cart', [HomeController::class, 'showCart']);


//Home routes

Route::get('/', [HomeController::class, 'index']);






