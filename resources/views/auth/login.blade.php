@extends('layouts.auth')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')

<div class="login-bg">

    <div class="login-card">

        <div class="profile-icon">
            <img src="{{ asset('images/ikon profil.png') }}" class="profile-svg">
        </div>

        <h1 class="login-title" style="font-family: georgia, serif;">UniVerse</h1>

        @if ($errors->has('login'))
            <div style="
                background:#f8d7da;
                color:#842029;
                padding:10px 14px;
                border-radius:8px;
                margin-bottom:12px;
                font-size:14px;">
                {{ $errors->first('login') }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username Anda">

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password Anda">

            <a href="{{ route('forgot.password') }}" class="forgot">
                Lupa Password?
            </a>

            <button type="submit" class="btn-login">Login</button>

            {{-- TAMBAHKAN INI --}}
            <div class="login-links">
                Belum punya akun?
                <a href="{{ route('register') }}">Registrasi</a>
            </div>
        </form>



    </div>
</div>


@endsection
