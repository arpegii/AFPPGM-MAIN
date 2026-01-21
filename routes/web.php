<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;

// Home / Login & Signup page
Route::get('/', [AuthController::class, 'show'])->name('auth.form');

// Authentication
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Email verification routes
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.resend');
});

// Protected routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard / Profile page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Document routes
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/documents', [DocumentController::class, 'index'])->name('document.index');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::delete('/profile/remove', [ProfileController::class, 'remove'])->name('profile.remove');

    // Change password route
    Route::post('/change-password', [PasswordController::class, 'update'])->name('password.update');
});
