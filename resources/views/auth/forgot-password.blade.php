@extends('layouts.auth')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')

<div class="login-bg">
    <div class="login-card">

        <a href="{{ route('login') }}" style="display:inline-block; margin-bottom:12px;">
            ← Kembali ke Login
        </a>

        <h1 class="login-title" style="font-family: georgia, serif;">
            Lupa Password
        </h1>

        <p style="font-size:14px; color:#555; margin-bottom:18px;">
            Demi keamanan, password tidak dapat ditampilkan.
            Silakan hubungi admin untuk reset akun Anda.
        </p>

        <div style="
            background:#f7efe3;
            padding:14px;
            border-radius:12px;
            font-size:14px;
            color:#6b4b3e;
        ">
            <strong>Admin UniVerse</strong><br><br>
            📧 Email:
            <a href="mailto:admin@universe.ac.id">
                admin@universe.ac.id
            </a><br>
            📱 WhatsApp:
            <a href="https://wa.me/628123456789" target="_blank">
                0812-3456-789
            </a>
        </div>

    </div>
</div>

@endsection
