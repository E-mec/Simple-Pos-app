<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/orders', OrderController::class);
Route::resource('/products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/users', UserController::class);
Route::resource('/companies', CompanyController::class);
Route::resource('/transactions', TransactionController::class);
Route::resource('/sections', SectionController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/subcategories', SubCategoryController::class);


Route::get('/barcode', [ProductController::class, 'GetProductBarcode'])->name('products.barcode');



