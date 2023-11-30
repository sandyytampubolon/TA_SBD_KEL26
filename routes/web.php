<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TransaksiCOntroller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', [ProdukController::class , 'index'])->name('produk-index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk-create');
Route::post('/produk/store',[ProdukController::class, 'storeProduk'])->name('produk-store');
Route::get('/showproduk{id_item}',[ProdukController::class, 'showProduk'])->name('produk-show');
Route::post('/produk/update{id_item}',[ProdukController::class, 'updateProduk'])->name('produk-update');
Route::get('/produk/delete{id_item}',[ProdukController::class, 'deleteProduk'])->name('produk-delete');
Route::get('/produk/softdelete{id_item}',[ProdukController::class, 'softDelete'])->name('produk-softdelete');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan-index');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan-create');
Route::post('/pelanggan/store', [PelangganController::class, 'storePelanggan'])->name('pelanggan-store');
Route::get('/showpelanggan/{id_pelanggan}', [PelangganController::class, 'showPelanggan'])->name('pelanggan-show');
Route::post('/pelanggan/update{id_pelanggan}', [PelangganController::class, 'updatePelanggan'])->name('pelanggan-update');
Route::get('/pelanggan/delete/{id_pelanggan}', [PelangganController::class, 'deletePelanggan'])->name('pelanggan-delete');

Route::get('/merk', [MerkController::class, 'index'])->name('merk-index');
Route::get('/merk/create', [MerkController::class, 'create'])->name('merk-create');
Route::post('/merk/store', [MerkController::class, 'storeMerk'])->name('merk-store');
Route::get('/showmerk/{id_merk}', [MerkController::class, 'showMerk'])->name('merk-show');
Route::post('/merk/update{id_merk}', [MerkController::class, 'updateMerk'])->name('merk-update');
Route::get('/merk/delete/{id_merk}', [MerkController::class, 'deleteMerk'])->name('merk-delete');
Route::get('/merk/softdelete{id_merk}',[MerkController::class, 'softDelete'])->name('merk-softdelete');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('trans-index');
Route::get('/join', [TransaksiController::class, 'innerJoin'])->name('trans-join');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('trans-create');
Route::post('/transaksi/store', [TransaksiController::class, 'storeTrans'])->name('trans-store');
Route::get('/showtransaksi/{id_transaction}', [TransaksiController::class, 'showTrans'])->name('trans-show');
Route::post('/transaksi/update{id_transaction}', [TransaksiController::class, 'updateTrans'])->name('trans-update');
Route::get('/transaksi/delete/{id_transaction}', [TransaksiController::class, 'deleteTrans'])->name('trans-delete');
Route::get('/transaksi/softdelete{id_transaction}', [TransaksiController::class, 'softDelete'])->name('trans-softdelete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
