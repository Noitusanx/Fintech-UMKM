<?php

use App\Http\Controllers\FintechController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FintechController::class, 'index']);

// authenticate
Route::get('/masuk', [FintechController::class,'login'])->name('login')->middleware('guest');

Route::post('/masuk', [FintechController::class,'authenticate']);

Route::post('/keluar', [FintechController::class, 'logout']);

Route::get('/daftar', [FintechController::class,'register'])->name('register')->middleware('guest');

Route::post('/daftar', [FintechController::class,'storeReg']);

Route::get('/dashboard', [FintechController::class,'dashboard'])->middleware('admin');

// produk
Route::get('/produk', [FintechController::class,'produk'])->name('produk')->middleware('admin');

Route::post('/produk', [FintechController::class,'store'])->middleware('admin');

Route::get('/produk/{id}/edit', [FintechController::class, 'edit'])->name('produk.edit')->middleware('admin');

Route::post('/produk/{id}', [FintechController::class, 'update'])->name('produk.update')->middleware('admin');

Route::get('/produk/tambah', [FintechController::class,'form_produk'])->middleware('admin');

Route::delete('/produk/{id}', [FintechController::class, 'destroy'])->name('produk.destroy')->middleware('admin');

Route::get('/produk/{id}/detail', [FintechController::class, 'product_detail'])->name('produk.product_detail');

// baru
Route::post('produk/{id}/detail', [FintechController::class, 'storeRate'])->name('ulasan');

Route::get('/finansial', [FintechController::class,'finansial'])->name('finansial')->middleware('admin');

Route::get('/finansial/tambah', [FintechController::class, 'form_finansial']);

Route::post('/finansial', [FintechController::class,'storeFinansial'])->name('')->middleware('admin');

Route::get('/finansial/{id}/edit', [FintechController::class, 'editFinansial'])->name('finansial.edit');

Route::post('/finansial/{id}', [FintechController::class, 'updateFinansial'])->name('finansial.update');

Route::delete('/finansial/{id}', [FintechController::class, 'destroyFinansial'])->name('finansial.destroy');








