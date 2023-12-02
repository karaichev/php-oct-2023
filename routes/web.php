<?php

use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\UserController;
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

Route::get('/', BookController::class . '@index')->name('home');

Route::controller(BookController::class)->prefix('/books')->group(function () {
    Route::get('/', 'index')->name('books.index');
    Route::get('/create', 'create')->name('book.create');
    Route::post('/', 'store')->name('book.store');
    Route::get('/search', 'search')->name('books.search');
    Route::get('/{book}', 'show')->name('books.show');
});

Route::controller(UserController::class)->prefix('user')->group(function () {
    Route::get('/login', 'login')->name('user.login');
    Route::get('/logout', 'logout')->name('user.logout');
    Route::post('/auth', 'auth')->name('user.auth');
});
