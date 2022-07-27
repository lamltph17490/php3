<?php

use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('list', [ProductController::class, 'list'])->name('list');
    Route::put('list/{id}', [ProductController::class, 'changeStatus'])->name('changeStatus');
    Route::post('list', [ProductController::class, 'search'])->name('search');
    Route::get('add', [ProductController::class, 'addForm'])->name('addForm');
    Route::post('add', [ProductController::class, 'saveAdd'])->name('saveAdd');
    Route::delete('delete/{id}', [ProductController::class, 'delete'])->name('delete');
});
