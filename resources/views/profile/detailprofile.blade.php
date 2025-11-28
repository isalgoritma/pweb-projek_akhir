@extends('layouts.dashboard')

@section('title', 'Detail Profil')

@section('content')

<div class="pt-24 max-w-4xl mx-auto text-center">

    {{-- Foto Profil --}}
    <div class="w-28 h-28 mx-auto bg-[#f3e8dd] rounded-2xl flex items-center justify-center mb-10 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#735353]" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3Zm0 1c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4Z"/>
        </svg>
    </div>

    {{-- Card 1 --}}
    <div class="profile-card">
        <div class="font-semibold text-[#735353] text-left">Username:</div>
        <div class="text-[#735353]">{{ Auth::user()->username }}</div>
    </div>

    {{-- Card 2 --}}
    <div class="profile-card">
        <div class="font-semibold text-[#735353] text-left">Email:</div>
        <div class="text-[#735353]">{{ Auth::user()->email }}</div>
    </div>

    {{-- Card 3 --}}
    <div class="profile-card">
        <div class="font-semibold text-[#735353] text-left">Nomor Telepon:</div>
        <div class="text-[#735353]">
            {{ Auth::user()->phone_number ?? 'Belum diisi' }}
        </div>
    </div>

</div>

@endsection

@push('styles')
<style>
    .profile-card {
        background: #ffffff;
        outline: 3px solid #f7efe3;
        padding: 15px;
        border-radius: 20px;
        max-width: 450px;
        margin: 0 auto 25px auto;
        text-align: left;
        font-size: 16px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 15px
    }
    body {
        background: #ffffff !important;
    }
</style>
@endpush
