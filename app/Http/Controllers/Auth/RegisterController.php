<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $validated = $request->validate([
        'nama_depan' => 'required|string',
        'nama_belakang' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6|confirmed'
    ]);

    User::create([
        'nama_depan' => $validated['nama_depan'],
        'nama_belakang' => $validated['nama_belakang'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']) 
    ]);

    return redirect('/login')->with('success', 'Akun berhasil dibuat');
}

}
