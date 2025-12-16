@extends('layouts.dashboard')

@section('title', 'Konfirmasi Barang')

@section('content')
<div class="max-w-6xl mx-auto mt-14 mb-24">

    {{-- HEADER --}}
    <div class="bg-[#f7efe3] rounded-3xl px-10 py-8 mb-14">
        <h2 class="text-2xl font-bold text-[#735353]">
            Konfirmasi Barang
        </h2>
        <p class="text-[#735353] mt-1">
            Verifikasi apakah barang ini milik anda sesuai kriteria barang yang hilang
        </p>
    </div>

    {{-- FORM --}}
    <form action="{{ route('verification.store', $item->id) }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">

            {{-- KIRI --}}
            <div>
                <h3 class="text-xl font-semibold text-[#735353] mb-5">
                    Foto Barang
                </h3>

                <div class="bg-[#f2f2f2] rounded-2xl h-72 flex items-center justify-center mb-8">
                    @if($item->image_path)
                        <img src="{{ asset('storage/'.$item->image_path) }}"
                             class="h-full object-contain rounded-xl">
                    @else
                        <span class="text-gray-400">Foto tidak tersedia</span>
                    @endif
                </div>

                <button type="submit"
                    class="w-full bg-[#735353] text-white py-3 rounded-xl font-semibold hover:bg-[#5e4242] transition">
                    Konfirmasi
                </button>
            </div>

            {{-- KANAN --}}
            <div>
                <h3 class="text-xl font-semibold text-[#735353] mb-6">
                    Detail Verifikasi Barang
                </h3>

                <div class="space-y-5">

                    <div>
                        <label class="block text-[#735353] font-semibold mb-1">
                            Nama Barang
                        </label>
                        <input type="text" value="{{ $item->title }}"
                            class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                            disabled>
                    </div>

                    <div>
                        <label class="block text-[#735353] font-semibold mb-1">
                            Ciri - Ciri
                        </label>
                        <textarea name="keterangan_kriteria"
                            class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none h-28 resize-none"
                            placeholder="Jelaskan ciri barang anda"
                            required></textarea>
                    </div>

                    <div>
                        <label class="block text-[#735353] font-semibold mb-1">
                            Tanggal Kehilangan
                        </label>
                        <input type="text" value="{{ $item->date_lost }}"
                            class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                            disabled>
                    </div>

                    <div>
                        <label class="block text-[#735353] font-semibold mb-1">
                            Lokasi Kehilangan
                        </label>
                        <input type="text" value="{{ $item->location }}"
                            class="w-full bg-[#f7efe3] rounded-xl px-5 py-3 border-none"
                            disabled>
                    </div>

                </div>
            </div>

        </div>
    </form>

</div>
@endsection
