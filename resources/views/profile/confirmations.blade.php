@extends('layouts.dashboard')

@section('title', 'Konfirmasi Kriteria & Barang')

@section('content')
<div class="max-w-6xl mx-auto mt-12">

    {{-- KONFIRMASI KRITERIA --}}
    <h2 class="text-2xl font-bold text-[#735353] mb-6">
        Konfirmasi Kriteria
    </h2>

    <div class="grid grid-cols-5 gap-6 mb-16">
        @forelse ($verifiedCriteria as $item)
            <div class="bg-white rounded-xl shadow p-3 relative">
                <div class="h-40 bg-[#f7efe3] rounded mb-3"></div>

                <h4 class="font-semibold">Kategori</h4>
                <p class="text-sm text-gray-400">Selengkapnya...</p>

                <span class="absolute bottom-3 right-3
                    bg-green-500 text-white rounded-full w-8 h-8
                    flex items-center justify-center">
                    ✓
                </span>
            </div>
        @empty
            <p class="text-gray-400 col-span-5">Belum ada kriteria terverifikasi</p>
        @endforelse
    </div>

    {{-- KONFIRMASI BARANG --}}
    <h2 class="text-2xl font-bold text-[#735353] mb-6">
        Konfirmasi Barang
    </h2>

    <div class="grid grid-cols-5 gap-6">
        @forelse ($approvedItems as $item)
            <div class="bg-white rounded-xl shadow p-3 relative">
                <div class="h-40 bg-[#f7efe3] rounded mb-3"></div>

                <h4 class="font-semibold">Kategori</h4>
                <p class="text-sm text-gray-400">Selengkapnya...</p>

                <span class="absolute bottom-3 right-3
                    bg-green-500 rounded-full w-8 h-8
                    flex items-center justify-center">
                    <img src="{{ asset('images/whatsapp.png') }}" class="w-5">
                </span>
            </div>
        @empty
            <p class="text-gray-400 col-span-5">Belum ada barang disetujui</p>
        @endforelse
    </div>

</div>
@endsection
