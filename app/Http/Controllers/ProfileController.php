<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Adaugă validări suplimentare după cum e necesar
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Actualizează alte câmpuri după cum e necesar
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    }
}
