<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/products', 'products')->name('products');
Route::view('/contact', 'contact')->name('contact');

Route::post('/signin', [AuthController::class, 'signin']);
Route::get('/signin', function () {
    return view('signin');
})->name('signin.form');

Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/signup', function () {
    return view('signup');
})->name('signup.form');

Route::view('/shoppingcard', 'shoppingcard')->name('shoppingcard');