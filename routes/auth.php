<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;


Route::middleware('guest')->group(function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard/advisors/add', [RegisteredUserController::class, 'create'])
    ->name('register');
    Route::post('/dashboard/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/dashboard/profile/{id}', [DashboardController::class, 'update'])->name('update_profile');

    Route::get('/dashboard/faq', [DashboardController::class, 'faq'])->name('faq_dash');

    Route::prefix('dashboard/blog')->group(function () {
        Route::get('/', [DashboardController::class, 'blog'])->name('blog_dash');
        Route::get('/add', [DashboardController::class, 'newBlog'])->name('new_blog');
        Route::post('/store', [BlogController::class, 'store'])->name('blog_store');
        Route::get('/{title}', [BlogController::class, 'dash_show'])->name('blog_dash_view');
    });

    // Route::get('/dashboard/blog', [DashboardController::class, 'blog'])->name('blog_dash');
    // Route::get('/dashboard/blog/add', [DashboardController::class, 'newBlog'])->name('new_blog');
    // Route::get('/dashboard/blog/{title}', [BlogController::class, 'show'])->name('blog_dash_view');

    Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');

    Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/dashboard/properties', [DashboardController::class, 'properties'])->name('properties');
    Route::get('/dashboard/properties/add', [DashboardController::class, 'newProperty'])->name('new_property');
    Route::get('/dashboard/properties/view/{id}', [DashboardController::class, 'property'])->name('view_property');
    Route::get('/dashboard/properties/edit/{id}', [PropertyController::class, 'edit'])->name('edit_property');
    Route::put('/property/update/{id}', [PropertyController::class, 'update'])->name('update_property');
    Route::post('/property/store', [PropertyController::class, 'store'])->name('store_property');
    Route::post('/property/percent/', [PropertyController::class, 'percent'])->name('property_percent');

    Route::get('/dashboard/advisors', [DashboardController::class, 'advisors'])->name('advisors');
    Route::get('/dashboard/owners', [DashboardController::class, 'owners'])->name('owners');

    Route::get('/dashboard/bdd/property', [DashboardController::class, 'mewProperty'])->name('mew_property');

    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
