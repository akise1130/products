<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('contacts.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('contacts.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('contacts.store');
Route::get('/products/search',[ProductController::class,'search'])->name('products.search');

Route::resource('products', ProductController::class);

Route::get('/products/{product}',[ProductController::class,'show'])->name('products.show');