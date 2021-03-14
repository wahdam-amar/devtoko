<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('supplier', \App\Http\Controllers\SupplierController::class);
    Route::resource('ekspedisi', \App\Http\Controllers\EkspedisiController::class);
    Route::resource('jasa', \App\Http\Controllers\JasaController::class);
    Route::resource('stock', \App\Http\Controllers\StockController::class);
    Route::get('transaction/', [\App\Http\Controllers\StockController::class, 'transaction'])->name('stock.transaction');
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
});

Route::view('/ui', 'ui.index')->name('ui');

Route::view('/invoice', 'invoice.index');
