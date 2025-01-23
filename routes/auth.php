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
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ContactController;

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

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

Route::middleware('auth')->group(function () {

    Route::get('dashboard/contact', function () {
        Mail::to('geyser2004@gmail.com')
        ->send(new ContactMessage());
        session()->flash('success', 'Mensaje Exitoso');
        return view('auth.contact');
    })->name('contact');

    Route::post('dashboard/contact', [ContactController::class, 'send'])->name('contact.send');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/dashboard/profile/edit', [DashboardController::class, 'profile_edit'])->name('profile.edit');
    Route::put('/dashboard/profile/', [DashboardController::class, 'update'])->name('profile.update');

    Route::get('/dashboard/faq', [DashboardController::class, 'faq'])->name('faq_dash');

    Route::prefix('dashboard/blog')->group(function () {
        Route::get('/', [DashboardController::class, 'blog'])->name('blog_dash');
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('blog_store');
        Route::get('/{title}', [BlogController::class, 'dash_show'])->name('blog_dash_view');
    });


    Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');

    // Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('products');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::resource('property', PropertyController::class);
    });

    // // Property Views
    // Route::get('/dashboard/property', [PropertyController::class, 'index'])->name('property.index');
    // Route::get('/dashboard/property/create', [PropertyController::class, 'create'])->name('property.create');
    // Route::get('/dashboard/property/{id}', [PropertyController::class, 'show'])->name('property.show');
    // Route::get('/dashboard/property/{id}/edit', [PropertyController::class, 'edit'])->name('property.edit');

    // // Property CRUD
    // Route::post('/property', [PropertyController::class, 'store'])->name('property.store');
    // Route::put('/property/{id}', [PropertyController::class, 'update'])->name('property.update');
    // Route::delete('/property/{id}', [PropertyController::class, 'destroy'])->name('property.delete');

    // Route::post('/property/percent/', [PropertyController::class, 'percent'])->name('property.percent');

    // Advisor Views
    Route::get('/dashboard/advisor', [AdvisorController::class, 'index'])->name('advisor.index');
    Route::get('/dashboard/advisor/create', [RegisteredUserController::class, 'create'])->name('advisor.create');
    Route::get('/dashboard/advisor/{id}', [AdvisorController::class, 'show'])->name('advisor.show');
    Route::get('/dashboard/advisor/{id}/edit', [AdvisorController::class, 'edit'])->name('advisor.edit');

    // Advisor CRUD
    Route::post('/dashboard/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/dashboard/owner', [OwnerController::class, 'index'])->name('owner.index');

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
