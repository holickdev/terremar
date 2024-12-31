<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/products', function () {
    return view('products');
})->name('product');

Route::get('/property', [PropertyController::class, 'index'])->name('property');
Route::get('/property/{id}', [PropertyController::class, 'show'])->name('property.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/blog/{title}', [BlogController::class, 'show'])->name('blog.view');

Route::get('/buy', function () {
    return view('services');
})->name('buy');

Route::get('/sell', [PropertyController::class, 'show'])->name('sell');

Route::get('/franchise', function () {
    return view('services');
})->name('franchise');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
