@extends('layouts.dashboard')
@section('title', 'Konfirmasi Kriteria')

@section('content')
<div class="max-w-6xl mx-auto mt-12 mb-20">

    <div class="bg-[#f7efe3] rounded-3xl px-10 py-8 mb-10">
        <h2 class="text-2xl font-bold text-[#735353]">Konfirmasi Kriteria</h2>
        <p class="text-[#735353] mt-1">
            Verifikasi apakah barang ini milik sesuai dengan detail di bawah
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

        {{-- KIRI --}}
        <div>
            <h3 class="text-xl font-semibold text-[#735353] mb-4">
                Foto Barang Ditemukan
            </h3>

            <div class="bg-gray-100 rounded-2xl h-72 flex items-center justify-center mb-8">
                @if($verification->item->image_path)
                    <img src="{{ asset('storage/'.$verification->item->image_path) }}"
                         class="h-full object-contain rounded-xl">
                @else
                    <span class="text-gray-400">Foto tidak tersedia</span>
                @endif
            </div>

            {{-- APPROVE --}}
            <form action="{{ route('verification.approve', $verification->id) }}" method="POST">
                @csrf
                <button class="w-full bg-[#735353] text-white py-3 rounded-xl font-semibold mb-3">
                    Konfirmasi
                </button>
            </form>

            {{-- REJECT --}}
            <form action="{{ route('verification.reject', $verification->id) }}" method="POST">
                @csrf
                <button class="w-full bg-red-500 text-white py-3 rounded-xl font-semibold">
                    Tolak
                </button>
            </form>
        </div>

        {{-- KANAN --}}
        <div>
            <h3 class="text-xl font-semibold text-[#735353] mb-6">
                Detail Verifikasi Barang
            </h3>

            <div class="space-y-4">

                <div>
                    <label class="font-semibold text-[#735353]">Nama Barang</label>
                    <input type="text"
                        value="{{ $verification->item->title }}"
                        class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                        disabled>
                </div>

                <div>
                    <label class="font-semibold text-[#735353]">Ciri - Ciri (Pengklaim)</label>
                    <textarea
                        class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none h-28"
                        disabled>{{ $verification->keterangan_kriteria }}</textarea>
                </div>

                <div>
                    <label class="font-semibold text-[#735353]">Tanggal</label>
                    <input type="text"
                        value="{{ $verification->item->date_lost }}"
                        class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                        disabled>
                </div>

                <div>
                    <label class="font-semibold text-[#735353]">Lokasi</label>
                    <input type="text"
                        value="{{ $verification->item->location }}"
                        class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                        disabled>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
