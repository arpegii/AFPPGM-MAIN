<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', [AuthController::class, 'show'])->name('auth.form');

// Login & Signup
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/

// Handle verification link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    // Redirect back to signup/login page with flash to show modal
    return redirect()->route('auth.form')->with('resent', true);
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return redirect()->route('auth.form')->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

/*
|--------------------------------------------------------------------------
| Protected Routes (authenticated + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/documents/create', [DocumentController::class, 'create'])
        ->name('document.create');

    Route::post('/documents', [DocumentController::class, 'store'])
        ->name('document.store');

    Route::get('/documents', [DocumentController::class, 'index'])
        ->name('document.index');
});
