<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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



/**
 * Product routes
 */
Route::get('/product/{product:slug}', [
    \App\Http\Controllers\ProductController::class,
    'show'
])->name('productshow');



Route::get('/menu', [
    HomeController::class,
    'menu'
])->name('menu');

Route::get('/cart', [
    HomeController::class,
    'cart'
])->name('cart');


//order routes
Route::get('/category/{slug}', [
    \App\Http\Controllers\CategoryController::class,
    'show'
])->name('category.show');

Route::get('/', [HomeController::class,'home'])->name('home');

Route::resource('/order', \App\Http\Controllers\OrderController::class);

Route::middleware([
    'role:SuperAdministrator'
])->group(function () {

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    
    Route::get('/dashboard', [HomeController::class,'admin_dashboard'])->name('dashboard');

    Route::resource(
        'product-category',
        \App\Http\Controllers\ProductCategoryController::class
    );

    Route::resource(
        'product',
        \App\Http\Controllers\ProductController::class
    );

   Route::resource(
       'user',
       \App\Http\Controllers\UserController::class
   );
});

});
