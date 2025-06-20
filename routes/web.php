<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminProductController;

/*
|--------------------------------------------------------------------------
| Publieke pagina's
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');
Route::view('/contact', 'contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Winkelmandje (Cart)
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    // Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
Route::get('/shoppingcart', [CartController::class, 'showCart'])->name('shoppingcart');


/*
|--------------------------------------------------------------------------
| Productroutes
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/

Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

/*
|--------------------------------------------------------------------------
| Gebruiker profiel (alleen ingelogd)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('/admin/payments', [CartController::class, 'showPayments'])->name('admin.payments');
});

/*
|--------------------------------------------------------------------------
| Admin dashboard + beheer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', AdminProductController::class);

});

/*
|--------------------------------------------------------------------------
| Stripe betalingen
|--------------------------------------------------------------------------
*/

Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/succes', [StripeController::class, 'succes'])->name('checkout.succes');


/*
|--------------------------------------------------------------------------
| Auth (Laravel Breeze/Fortify/etc.)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
