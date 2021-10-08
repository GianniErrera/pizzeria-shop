<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CustomersViewController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderlineController;
use App\Http\Controllers\ProductController;

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



Route::get('/admin', [MenuController::class, 'index']);
Route::get('/', CustomersViewController::class)->name('customers-view');

Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/orderlines/{orderline}', [OrderlineController::class, 'edit']);
Route::post('/orderlines/{product_id}', [OrderlineController::class, 'store']);
Route::patch('/orderlines/{orderline}', [OrderlineController::class, 'update']);
Route::delete('/orderlines/{orderline}', [OrderlineController::class, 'destroy']);
Route::get('/orders/confirm/{order}', [OrderController::class, 'show'])->name('order.confirm');
Route::delete('/orders/{order}', [OrderController::class, 'destroy']);



Route::post('/menu', [MenuController::class, 'store']);


