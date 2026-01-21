<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    // Show verification notice (modal handled in session)
    public function notice()
    {
        return redirect()->route('auth.form');
    }

    // Handle email verification link
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('auth.form')->with('verified', true);
    }

    // Resend verification email
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('resent', true);
    }
}
