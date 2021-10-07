<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomersViewController;
use App\Http\Controllers\OrderController;
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
Route::get('/orderlines/{orderline}', [OrderController::class, 'edit']);
Route::patch('/orderlines/{orderline}', [OrderController::class, 'update']);


Route::post('/menu', [MenuController::class, 'store']);

Route::post('/orders/{product_id}', [OrderController::class, 'store']);
