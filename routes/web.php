<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware(IsAdmin::class)->group(function () {
        Route::resource('carousels', CarouselController::class);

        Route::resource('products', ProductController::class)->except(['index', 'show']);
    });

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
