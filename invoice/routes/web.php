<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CartController;
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

// Route::get('/', function () {
//     return view('pages/login');
// });

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/404', function () {
    return view('pages/404');
});

Auth::routes();

Route::prefix('admin/category')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category');
    Route::post('/add', 'store')->name('add');
    Route::get('/show', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{id}', 'destroy')->name('destroy');
});

Route::prefix('admin/service')->controller(ServiceController::class)->group(function(){
    Route::get('/', 'index')->name('service');
    Route::post('/add', 'store')->name('service.add');
    Route::get('/show', 'show')->name('service.show');
    Route::get('/edit/{id}', 'edit')->name('service.edit');
    Route::post('/update', 'update')->name('service.update');
    Route::get('/delete/{id}', 'destroy')->name('service.destroy');
});

Route::prefix('admin/products')->controller(ProductsController::class)->group(function(){
    Route::get('/', 'index')->name('product');
    Route::post('/add', 'store')->name('product.add');
    Route::get('/show', 'show')->name('product.show');
    Route::get('/edit/{id}', 'edit')->name('product.edit');
    Route::post('/update', 'update')->name('product.update');
    Route::get('/delete/{id}', 'destroy')->name('product.destroy');
});

Route::prefix('admin/company')->controller(CompanyController::class)->group(function(){
    Route::get('/', 'index')->name('company');
    Route::post('/add', 'store')->name('company.add');
    Route::get('/show', 'show')->name('company.show');
    Route::get('/edit/{id}', 'edit')->name('company.edit');
    Route::post('/update', 'update')->name('company.update');
    Route::get('/delete/{id}', 'destroy')->name('company.destroy');
});

Route::prefix('admin/cart')->controller(CartController::class)->group(function(){
    Route::get('/', 'index')->name('cart');
    Route::get('/category/service/{id}', 'categoryWiseService')->name('category.service.show');
    Route::post('/category/service/add', 'addServicetoCart')->name('category.service.add');//ajax route
    Route::post('/category/service/delete', 'deleteServicetoCart')->name('category.service.delete');//ajax route
    Route::post('/product/parts/add', 'addPartstoCart')->name('product.parts.add');//ajax route
    Route::post('/product/parts/delete', 'deletePartstoCart')->name('product.parts.add');//ajax route
    Route::get('/invoice/{company}/{invoiceid}','generateInvoice')->name('cart.invoice');
    
});
