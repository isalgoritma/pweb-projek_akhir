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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'username'      => 'required',
            'name'          => 'required',
            'phone_number'  => 'required|numeric|digits_between:11,13',
            'email'         => 'required|email',
            'password'      => 'required|min:8'
        ]);


        User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'phone_number' => $request->phone_number,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success','Akun berhasil dibuat');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }



}
