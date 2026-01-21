<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show profile page
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Update personal info
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'birthdate'    => 'nullable|date',
            'address'      => 'nullable|string|max:500',
            'city'         => 'nullable|string|max:100',
        ]);

        // Only update the allowed fields
        $user->update($validated);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    // Upload profile picture
    public function upload(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Delete old picture if exists
        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
        }

        // Store new picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Save path in database
        $user->profile_picture = $path;
        $user->save();

        return back()->with('success', 'Profile picture updated successfully!');
    }

    // Remove profile picture
    public function remove()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::delete('public/' . $user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return back()->with('success', 'Profile picture removed.');
    }
}
