<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SerialController;
use App\Http\Controllers\ClaimWarrantyController;
use App\Http\Controllers\Technicianstroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RepairServiceController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\ClaimFixController;
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
// ----------------------------FRONTEND----------------------------------
Route::get('/', [IndexController::class, 'home'])->name('/');
Route::get('/recomment-product', [IndexController::class, 'recommentProduct'])->name('recomment-product');
Route::get('/register-warranty', [IndexController::class, 'registerWarranty'])->name('register-warranty');
Route::get('/check-warranty', [IndexController::class, 'checkWarranty'])->name('check-warranty');
Route::post('/check-serial', [IndexController::class, 'checkSerial'])->name('check-serial');
Route::post('/add-register-warranty', [IndexController::class, 'addRegisterWarranty'])->name('add-register-warranty');
Route::get('/register-warranty-info-customer', [IndexController::class, 'RegisterWarrantyInfo'])->name('register-warranty-info-customer');
Route::post('/comfirm-register-warranty', [IndexController::class, 'comfirmRegisterWarranty'])->name('comfirm-register-warranty');
Route::get('/claim-warranty', [IndexController::class, 'claimWarranty'])->name('claim-warranty');
Route::post('/send-claim-warranty', [IndexController::class, 'sendClaimWarranty'])->name('send-claim-warranty');
Route::get('/claim-fix', [IndexController::class, 'claimfix'])->name('claim-fix');
Route::post('/send-claim-fix', [IndexController::class, 'sendClaimfix'])->name('send-claim-fix');





// ----------------------------BACKEND----------------------------------
// ADMIN
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/checklogin', [AdminController::class, 'checklogin'])->name('checklogin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/infomationAdmin', [AdminController::class, 'infomationAdmin'])->name('infomationAdmin');

// Technicians
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/employee-view-detail/{order_code}', [EmployeeController::class, 'viewDtail'])->name('employee-view-detail');
Route::post('/solution', [EmployeeController::class, 'solution'])->name('solution');
// Route::get('/comfirm-fisnish/{order_code}', [EmployeeController::class, 'comfirmFisnish'])->name('comfirm-fisnish');
Route::post('/comfirm-fisnish/{order_code}', [EmployeeController::class, 'comfirmFisnish'])->name('comfirm-fisnish');
Route::get('/infomationTaff', [EmployeeController::class, 'infomationTaff'])->name('infomationTaff');
Route::get('/map', [EmployeeController::class, 'map'])->name('map');


// ORDER
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/order-add', [OrderController::class, 'add'])->name('order-add');
Route::post('/order-address', [OrderController::class, 'getAddress'])->name('order-address');
Route::post('/add-order', [OrderController::class, 'addOrder'])->name('add-order');
Route::post('/product-choose', [OrderController::class, 'getProduct'])->name('product-choose');
Route::get('/order-view-detail/{order_code}', [OrderController::class, 'orderViewDetail'])->name('order-view-detail');
Route::delete('/order/{order_code}/delete', [OrderController::class, 'deleteOrder'])->name('order-delete');
Route::get('/order-print/{order_code}', [OrderController::class, 'printorder'])->name('order-print');


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

// CLAIM WARRANTY
Route::get('/claim-warranty-show', [ClaimWarrantyController::class, 'index'])->name('claim-warranty-show');
Route::get('/claimwarranty-view-detail/{claim_code}', [ClaimWarrantyController::class, 'ClaimWarrantyViewDetail'])->name('claimwarranty-view-detail');
Route::post('/claim-warranty-job', [ClaimWarrantyController::class, 'job'])->name('claim-warranty-job');
Route::post('/claim-warranty-job/{id}/edit', [ClaimWarrantyController::class, 'jobTurn'])->name('claim-warranty-job-turn');

// // cLAIM FIX
// TECHNICIAN
Route::get('/technicians', [Technicianstroller::class, 'index'])->name('technicians');
Route::get('/technicians-add', [Technicianstroller::class, 'add'])->name('technicians-add');
Route::post('/add-technicians', [Technicianstroller::class, 'addTechnicians'])->name('add-technicians');
Route::get('/technicians/{id}/edit', [Technicianstroller::class, 'edit'])->name('technicians-edit');
Route::post('/technicians/{id}/update', [Technicianstroller::class, 'update'])->name('technicians-update');
Route::delete('/technicians/{id}/delete', [Technicianstroller::class, 'deletete'])->name('technicians-delete');

//REPAIR SERVICE    
Route::get('/repair-service', [RepairServiceController::class, 'index'])->name('repair-service');
Route::get('/repair-service-add', [RepairServiceController::class, 'add'])->name('repair-service-add');
Route::post('/add-repair-service', [RepairServiceController::class, 'addRepairService'])->name('add-repair-service');
Route::get('/repair-service/{id}/edit', [RepairServiceController::class, 'edit'])->name('repair-service-edit');
Route::post('/repair-service/{id}/update', [RepairServiceController::class, 'update'])->name('repair-service-update');
Route::delete('/repair-service/{id}/delete', [RepairServiceController::class, 'deletete'])->name('repair-service-delete');


// statistical
Route::get('/statistical', [StatisticalController::class, 'index'])->name('statistical');
Route::get('/statistical-detail', [StatisticalController::class, 'statisticalDetail'])->name('statistical-detail');
Route::post('/statistical-detail-get', [StatisticalController::class, 'getStatisticalDetail'])->name('statistical-detail-get');


Route::fallback(function () {
    return view('backend.include.error.pages-error-404');
});
