<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
public function update(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'confirmed', 'min:8'],
    ]);

    if (!Hash::check($request->current_password, auth()->user()->password)) {
        return back()->withErrors([
            'current_password' => 'Current password is incorrect.',
        ]);
    }

Auth::guard('web')->user()->update([
    'password' => Hash::make($request->new_password),
]);

return back()->with('password_updated', true);
}

}
