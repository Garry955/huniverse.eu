<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;

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

//Product routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');
//Admin/product
Route::delete('/product/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('isAdmin');
Route::get('/admin/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('isAdmin');
Route::post('/admin/product/store', [ProductController::class, 'store'])->name('product.store')->middleware('isAdmin');
Route::get('/admin/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('isAdmin');
Route::post('/admin/product/update/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('isAdmin');
Route::delete('/admin/product/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('isAdmin');

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

//Admin routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin.login');
Route::get('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('isAdmin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('isAdmin');
Route::get('/admin/products', [AdminController::class, 'listProducts'])->name('admin.products')->middleware('isAdmin');
