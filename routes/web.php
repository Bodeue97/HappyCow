<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
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

//homepage route
Route::get('/', [HomeController::class, 'index']);


//Application routes
//user
Route::get('/application_create', [App\Http\Controllers\ApplicationController::class, 'create'])->middleware('user');
Route::post('/application_store', [ApplicationController::class, 'store'])->middleware('user');
Route::get('/show_applications', [ApplicationController::class, 'show'])->middleware('user');
Route::put('/order_cattle/{id}', [ApplicationController::class, 'orderCattle'])->middleware('user');
Route::get('/show_my_orders', [ApplicationController::class, 'myReservedApplications'])->middleware('user');
Route::get('/my_applications', [ApplicationController::class, 'showMyApplications'])->middleware('user');

//boss
Route::get('/verify_applications', [ApplicationController::class, 'verifyApplications'])->middleware('boss');
Route::put('/verify_applications/{id}', [ApplicationController::class, 'confirmVerify'])->middleware('boss');
Route::delete('/verify_applications/{id}', [ApplicationController::class, 'delete'])->middleware('boss');

//accountant
Route::get('/accountant_finalize_orders', [ApplicationController::class, 'finalizeOrders'])->middleware('accountant');
Route::put('/finalize_order/{id}', [ApplicationController::class, 'finalizeUpdate'])->middleware('accountant');


//Transport routes
Route::get('/create_carrier', [\App\Http\Controllers\TransportController::class, 'addCarrier'])->middleware('transport');
Route::post('/create_carrier', [\App\Http\Controllers\TransportController::class, 'storeCarrier'])->middleware('transport');
Route::get('/show_carriers', [\App\Http\Controllers\TransportController::class, 'showCarriers'])->middleware('transport');
Route::delete('/carrier_delete/{id}', [\App\Http\Controllers\TransportController::class, 'delete'])->middleware('transport');
Route::get('/transport_assign', [\App\Http\Controllers\TransportController::class, 'showAssignTransport'])->middleware('transport');
Route::put('/transport_assign/{id}', [\App\Http\Controllers\TransportController::class, 'assignTransport'])->middleware('transport');
Route::post('/transport_assign',[\App\Http\Controllers\TransportController::class, 'storeTransport'] )->middleware('transport');
Route::get('/finalize_transport', [\App\Http\Controllers\TransportController::class, 'finalizeTransport'])->middleware('transport');
Route::put('/finalize_transport/{id}/{date}', [\App\Http\Controllers\TransportController::class, 'finalizeUpdate'])->middleware('tansport');





















//auth routes
Route::get('/register', [HomeController::class, 'register']);
Route::post('/register', [HomeController::class, 'store']);
Route::get('/logout',[ HomeController::class, 'logout'])->middleware('auth');
Route::get('/login', [HomeController::class, 'login']);
Route::post('/login', [HomeController::class, 'read']);





