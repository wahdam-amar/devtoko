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
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::get('json/customer', [\App\Http\Controllers\CustomerController::class, 'indexJson'])->name('customer.json');
    Route::get('customer/{customer}/invoice', [\App\Http\Controllers\CustomerController::class, 'invoice'])->name('customer.invoice');

    Route::resource('supplier', \App\Http\Controllers\SupplierController::class);

    Route::resource('ekspedisi', \App\Http\Controllers\EkspedisiController::class);

    Route::resource('jasa', \App\Http\Controllers\JasaController::class);

    Route::resource('stock', \App\Http\Controllers\StockController::class);
    Route::get('json/stock', [\App\Http\Controllers\StockController::class, 'indexJson'])->name('stock.json');

    Route::get('transaction', [\App\Http\Controllers\StockController::class, 'transaction'])->name('stock.transaction');
    Route::post('transaction', [\App\Http\Controllers\StockController::class, 'saveTransaction'])->name('stock.save');

    Route::resource('invoice', \App\Http\Controllers\InvoiceController::class);

    Route::resource('category', \App\Http\Controllers\CategoryController::class);
});

/**
 * Kebutuhan Dev
 */

Route::view('/ui', 'ui.index')->name('ui');

Route::view('/invoicetest', 'invoice.index');

Route::get('/custom', function () {
    dd(getCategory());

    //  Artisan::call('migrate:fresh --seed');
    // return Artisan::output();
})->name('custom');

/**
 * Test 
 */

Route::view('/test', 'input');
