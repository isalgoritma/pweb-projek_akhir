@extends('layouts.auth')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')

<div class="login-bg">

    <div class="login-card register-card">

        <div class="login-icon">
            <i class="bi bi-person-fill"></i>
        </div>

        <div class="login-title">
            Register
        </div>

        @if ($errors->any())
            <div style="
                background:#f8d7da;
                color:#842029;
                padding:10px 14px;
                border-radius:8px;
                margin-bottom:12px;
                font-size:14px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('register.proses') }}"
              method="POST"
              autocomplete="off">
            @csrf

            <input type="text" style="display:none">
            <input type="password" style="display:none">

            <label>Username</label>
            <input type="text"
                   name="username"
                   autocomplete="off"
                   placeholder="Masukkan username Anda"
                   required
                   class="mb-3">

            <label>Password</label>
            <input type="password"
                   name="password"
                   autocomplete="new-password"
                   placeholder="Masukkan password Anda"
                   required
                   class="mb-3">

            <label>Nama</label>
            <input type="text"
                   name="name"
                   autocomplete="off"
                   placeholder="Masukkan nama lengkap Anda"
                   required
                   class="mb-3">

            <label>No HP</label>
            <input type="text"
                   name="phone_number"
                   autocomplete="off"
                   placeholder="Masukkan nomor HP Anda"
                   required
                   class="mb-3">

            <label>Email</label>
            <input type="email"
                   name="email"
                   autocomplete="off"
                   placeholder="Masukkan email Anda"
                   required
                   class="mb-4">

            <button type="submit" class="btn-register">
                Daftar
            </button>

            <div class="login-links mt-3">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login</a>
            </div>

        </form>

    </div>
</div>

@endsection
