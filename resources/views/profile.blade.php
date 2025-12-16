@extends('layouts.dashboard')

@section('title', 'Profil Saya')

@section('content')

<div class="max-w-4xl mx-auto text-center
     {{ auth()->user()->role === 'admin' ? 'admin-profile-page' : 'pt-12' }}">

    {{-- Kartu Profil --}}
    <div class="mx-auto bg-[#f7efe3] p-6 rounded-3xl shadow-sm w-[420px] flex items-center gap-4 justify-center mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-[#735353]" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3Zm0 1c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4Z"/>
        </svg>

        <div class="text-left">
            <div class="text-xl font-semibold text-[#735353]">
                {{ Auth::user()->username }}
            </div>
            @unless(auth()->user()->role === 'admin')
                <div class="text-sm text-[#735353]">
                    {{ Auth::user()->email }}
                </div>
            @endunless

        </div>
    </div>


    {{-- Tombol Menu --}}
    @if(auth()->user()->role === 'admin')
        <div class="admin-menu">

            <a href="{{ route('admin.users') }}"
            class="profile-btn admin-btn">
                Kelola Pengguna
            </a>

            <a href="{{ route('admin.items') }}"
            class="profile-btn admin-btn">
                Kelola Barang
            </a>

        </div>
    @else

        {{-- MENU USER SAJA --}}
        <div class="flex flex-col gap-6">

            <a href="{{ route('profile.detailprofile') }}" class="profile-btn">
                Lihat Profile
            </a>

            <a href="{{ route('lost.create') }}" class="profile-btn">
                Tambah Barang Hilang
            </a>

            <a href="{{ route('found.create') }}" class="profile-btn">
                Tambah Barang Ditemukan
            </a>

            <a href="{{ route('lost.deletePage') }}" class="profile-btn">
                Hapus Barang
            </a>

            <a href="{{ route('criteria.index') }}" class="profile-btn">
                Konfirmasi Kriteria dan Barang
            </a>

        </div>
    @endif



<style>
    body {
        background: #ffffff !important;
    }
</style>

</div>
@endsection
