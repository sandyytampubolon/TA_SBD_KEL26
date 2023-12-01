<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VinylController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/vinyl', [VinylController::class , 'index'])->name('vinyl-index');
Route::get('/vinyl/create', [VinylController::class, 'create'])->name('vinyl-create');
Route::post('/vinyl/store',[VinylController::class, 'storeVinyl'])->name('vinyl-store');
Route::get('/showvinyl/{id_vinyl}',[VinylController::class, 'showVinyl'])->name('vinyl-show');
Route::post('/vinyl/update{id_vinyl}',[VinylController::class, 'updateVinyl'])->name('vinyl-update');
Route::get('/vinyl/delete{id_vinyl}',[VinylController::class, 'deleteVinyl'])->name('vinyl-delete');
Route::get('/vinyl/softdelete{id_vinyl}',[VinylController::class, 'softDelete'])->name('vinyl-softdelete');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer-index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer-create');
Route::post('/customer/store', [CustomerController::class, 'storeCustomer'])->name('customer-store');
Route::get('/showcustomer/{id_customer}', [CustomerController::class, 'showCustomer'])->name('customer-show');
Route::post('/customer/update{id_customer}', [CustomerController::class, 'updateCustomer'])->name('customer-update');
Route::get('/customer/delete/{id_customer}', [CustomerController::class, 'deleteCustomer'])->name('customer-delete');

Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category-create');
Route::post('/category/store', [CategoryController::class, 'storeCategory'])->name('category-store');
Route::get('/showcategory/{id_category}', [CategoryController::class, 'showCategory'])->name('category-show');
Route::post('/category/update{id_category}', [CategoryController::class, 'updateCategory'])->name('category-update');
Route::get('/category/delete/{id_category}', [CategoryController::class, 'deleteCategory'])->name('category-delete');
Route::get('/category/softdelete{id_category}',[CategoryController::class, 'softDelete'])->name('category-softdelete');

Route::get('/transaction', [TransaksiController::class, 'index'])->name('trans-index');
Route::get('/join', [TransaksiController::class, 'innerJoin'])->name('join-index');
Route::get('/transaction/create', [TransaksiController::class, 'create'])->name('trans-create');
Route::post('/transaction/store', [TransaksiController::class, 'storeTrans'])->name('trans-store');
Route::get('/showtransaction/{id_transaction}', [TransaksiController::class, 'showTrans'])->name('trans-show');
Route::post('/transaction/update{id_transaction}', [TransaksiController::class, 'updateTrans'])->name('trans-update');
Route::get('/transaction/delete/{id_transaction}', [TransaksiController::class, 'deleteTrans'])->name('trans-delete');
Route::get('/transaction/softdelete{id_transaction}', [TransaksiController::class, 'softDelete'])->name('trans-softdelete');


Route::get('/transaction/search', [TransaksiController::class, 'searchTransactions'])->name('trans-search');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
