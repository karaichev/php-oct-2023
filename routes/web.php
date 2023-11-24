<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('book.index');
    Route::get('/create', 'create')->name('book.create');
    Route::post('/store', 'store')->name('book.store');
    Route::get('/view/{book}', 'view')->name('book.view');
});
