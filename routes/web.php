<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/book', App\Http\Controllers\BookController::class);
Route::get('/rant', [App\Http\Controllers\BookController::class, 'rant'])->name('rant');


Route::post('quantity', [App\Http\Controllers\BookController::class, 'quantity'])->name('quantity');

Route::post('/rant-book', [App\Http\Controllers\BookController::class, 'rant_book'])->name('rant_book');

Route::post('rent_submit', [App\Http\Controllers\BookController::class, 'rant_book_submit'])->name('rant_book_submit');


Route::get('/return', [App\Http\Controllers\BookController::class, 'return'])->name('return');
Route::get('/return_book/{id}', [App\Http\Controllers\BookController::class, 'return_book'])->name('return_book');







