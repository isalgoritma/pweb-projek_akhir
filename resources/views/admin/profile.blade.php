@extends('layouts.dashboard')

@section('content')
<div class="flex flex-col items-center justify-center mt-16">

    {{-- Avatar Admin --}}
    <div class="flex flex-col items-center mb-8">
        <div class="w-24 h-24 rounded-full flex items-center justify-center"
             style="background:#e8d8c8;">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-12 h-12 text-[#735353]"
                 fill="currentColor"
                 viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3Zm0 1c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4Z"/>
            </svg>
        </div>

        <h2 class="mt-4 text-lg font-semibold text-[#735353]">
            Admin
        </h2>
    </div>

    {{-- Tombol Aksi Admin --}}
    <div class="flex flex-col gap-4 w-full max-w-xs">

        <a href="{{ route('admin.users') }}"
           class="text-center py-3 rounded-full font-medium text-white shadow"
           style="background:#735353;">
            Melihat Daftar Pengguna
        </a>

        <a href="{{ route('admin.items') }}"
           class="text-center py-3 rounded-full font-medium text-white shadow"
           style="background:#735353;">
            Hapus Barang
        </a>

    </div>

</div>
@endsection
