<?php

use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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
    return view('client .home');
});

Route::get('/sign-in', [AccountController::class, 'sign_in']);
Route::post('sign-in/sign-in-check', [AccountController::class, 'sign_in_check']);
Route::get('/register', [AccountController::class, 'register']);
Route::post('/register/create-account', [AccountController::class, 'create_account']);

Route::get('/admin', function () {
    return view('admin.home');
});

Route::group(['prefix' => '/'], function () {
    Route::get('/shop', function () {
        return view('client.shop');
    });

    Route::get('/product', function () {
        return view('client.product');
    });

    Route::get('/cart', function () {
        return view('client.cart');
    });

    Route::get('/checkout/{id}', function ($id) {
        return view('client.checkout');
    });
});

Route::get('/sign-in', function () {
    return view('auth.sign-in');
})->name('sign-in');

Route::prefix('/admin/users')->name('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('.list');
    Route::get('/create', [UserController::class, 'create'])->name('.create');
    Route::post('/store', [UserController::class, 'store'])->name('.store');
    Route::post('/edit/{user}', [UserController::class, 'edit'])->name('.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('.update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('.delete');
});
