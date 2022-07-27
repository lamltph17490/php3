<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::prefix('/users')->name('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('.list');
    Route::get('/create', [UsersController::class, 'create'])->name('.create');
    Route::post('/store', [UsersController::class, 'store'])->name('.store');
    Route::post('/edit/{user}', [UsersController::class, 'edit'])->name('.edit');
    Route::put('/update/{id}', [UsersController::class, 'update'])->name('.update');
    Route::delete('/delete/{user}', [UsersController::class, 'delete'])->name('.delete');
});
