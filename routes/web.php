<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SerialController;

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

Route::get('/', [IndexController::class, 'home'])->name('/');




// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/checklogin', [AdminController::class, 'checklogin'])->name('checklogin');

// ORDER
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order-add', [OrderController::class, 'add'])->name('order-add');
Route::post('/order-address', [OrderController::class, 'getAddress'])->name('order-address');
Route::post('/add-order', [OrderController::class, 'addOrder'])->name('add-order');


// MANUFACTURER
Route::get('/manufacturer', [ManufacturerController::class, 'index'])->name('manufacturer');
Route::get('/manufacturer-add', [ManufacturerController::class, 'manufacturer'])->name('manufacturer-add');
Route::post('/add-manufacturer', [ManufacturerController::class, 'addManufacturer'])->name('add-manufacturer');
Route::get('/manufacturer/{id}/edit', [ManufacturerController::class, 'editManufacturer'])->name('manufacturer-edit');
Route::post('/manufacturer/{id}/update', [ManufacturerController::class, 'updateManufacturer'])->name('manufacturer-update');
Route::delete('/manufacturer/{id}/delete', [ManufacturerController::class, 'deleteManufacturer'])->name('manufacturer-delete');


// PRODUCT
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product-add', [ProductController::class, 'productAdd'])->name('product-add');
Route::post('/product/add', [ProductController::class, 'add'])->name('add-product');
Route::get('/product/{id}/edit', [ProductController::class, 'productEdit'])->name('product-edit');
Route::delete('/product/{id}/delete', [ProductController::class, 'deleteProduct'])->name('product-delete');
Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product-update');

// SERIAL
Route::get('/serial', [SerialController::class, 'index'])->name('serial');
Route::get('/serial-add', [SerialController::class, 'serialAdd'])->name('serial-add');
Route::post('/serial-choose', [SerialController::class, 'getcateSerial'])->name('serial-choose');
Route::post('/serial/add', [SerialController::class, 'add'])->name('add-serial');
Route::get('/serial/{id}/edit', [SerialController::class, 'serialEdit'])->name('serial-edit');
Route::post('/serial/{id}/update', [SerialController::class, 'update'])->name('serial-update');

Route::delete('/serial/{id}/delete', [SerialController::class, 'delete'])->name('serial-delete');
