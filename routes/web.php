<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('/product', ProductController::class);

Route::controller(AuthController::class)->group(function () {
    //Show Login form
    Route::get('/login', 'login')->name('login')->middleware('guest');
    //Authenticate user
    Route::get('/authenticate', 'authenticate')->name('authenticate')->middleware('guest');
    // Logout user
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    // Register user
    Route::post('/store', 'store')->name('auth.store');
});

//User routes
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

//Cart routes
Route::get('/cart/show', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/addCart/{product}', [CartController::class, 'addCart'])->name('cart.addCart');
Route::post('/cart/deleteItem/{cart}', [CartController::class, 'deleteItem'])->name('cart.deleteItem');
Route::delete('/cart/delete/{cart}', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('/cart/updateItem/{cart}', [CartController::class, 'updateItem'])->name('cart.updateItem');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

//Order routes
Route::get('/orders', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::get('/order/show/{order}', [OrderController::class, 'show'])->name('order.show')->middleware('auth');
Route::get('/order/success', [OrderController::class, 'success'])->name('order.success');

//Contact routes
Route::post('/contact-us/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
