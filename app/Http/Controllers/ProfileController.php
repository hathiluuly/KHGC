<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request)
    {
        
        $user = Auth::user();

        $request->validate([
            'first_name' => 'nullable|string|max:30',
            'last_name' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:200',
        ]);

        $user->update($request->only(['first_name', 'last_name', 'address']));

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
