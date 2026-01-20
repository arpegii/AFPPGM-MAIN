<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth');
    }

   public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // ✅ THIS LINE redirects to dashboard
        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials',
    ]);
}


public function signup(Request $request)
{
    // 1️⃣ Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed', // if using password_confirmation
    ]);

    // 2️⃣ Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // 3️⃣ Log in the user
    Auth::login($user);

    // 4️⃣ Send email verification
    $user->sendEmailVerificationNotification();

    // 5️⃣ Redirect back to signup/login page with modal
    return redirect()->route('auth.form')->with('resent', true);
}


        public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.form');
}

}
