<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginProses(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'login' => 'Username atau password salah'
            ])->withInput();
        }

        if (!Auth::user()->is_active) {
            Auth::logout();
            return back()->withErrors([
                'login' => 'Akun Anda telah dinonaktifkan, silakan hubungi admin'
            ]);
        }

        if (Auth::user()->role === 'admin') {
            return redirect()->route('profile');
        }

        return redirect('/dashboard');
    }


    public function registerProses(Request $request)
    {
        $request->validate([
            'username'      => 'required|unique:users,username',
            'name'          => 'required',
            'phone_number'  => 'required|numeric|digits_between:11,13',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:8'
        ], [
            'username.unique' => 'Username sudah digunakan',
            'email.unique'    => 'Email sudah terdaftar',
        ]);

        User::create([
            'username'      => $request->username,
            'name'          => $request->name,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun berhasil dibuat, silakan login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
