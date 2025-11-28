@extends('layouts.dashboard')

@section('title', 'Barang Hilang & Ditemukan')

@section('content')

<style>
    /* ==== SEARCH BAR STYLE ==== */
    .search-wrapper {
        width: 100%;
        margin: -65px auto 40px auto;
    }

    .search-input {
        width: 100%;              /* Lebar penuh */
        max-width: 400px;         /* Batas maksimum */
        height: 45px;             /* Tinggi input */
        padding: 0 20px;          /* Padding kiri-kanan */
        border: 3px solid #735353;
        border-radius: 40px;      /* Membuat oval */
        font-size: 15px;
        color: #735353;
        margin: 0 auto;           /* Center */
        display: block;           /* Agar bisa center */
        background: #e6e2e2;
        transition: .2s;
    }

    .search-input:focus {
        outline: none;
        border-color: #a67676;
        box-shadow: 0 0 8px #73535338;
    }
</style>


<div class="pt-32 max-w-7xl mx-auto px-6">

    {{-- Search bar --}}
    <div class="search-wrapper">
        <input id="searchInput" type="text" placeholder="Cari barang..."
            class="search-input">
    </div>


    {{-- ========================================================= --}}
    {{--                      BARANG HILANG                       --}}
    {{-- ========================================================= --}}
    <h2 class="text-2xl font-bold text-[#735353] mb-4">Barang Hilang</h2>

    @foreach($categories as $cat)
        <div id="hilang-{{ strtolower($cat) }}"
            class="mb-12 p-4 rounded-lg transition
            @if($highlight == $cat) bg-[#73535314] border border-[#73535350] @endif">

            <h3 class="text-xl font-semibold text-[#735353] mb-4">{{ $cat }}</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @forelse($data[$cat]['lost'] as $item)

                    {{-- Card jika ada data --}}
                    <div class="bg-white shadow rounded-lg overflow-hidden item-card search-item p-0"
                        data-title="{{ strtolower($item->title) }}"
                        data-desc="{{ strtolower($item->description) }}">

                        {{-- GAMBAR --}}
                        <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}"
                            class="h-40 w-full object-cover">

                        <div class="p-3">

                            {{-- NAMA --}}
                            <div class="font-bold text-sm text-[#735353]">
                                {{ $item->title }}
                            </div>

                            {{-- DESKRIPSI --}}
                            <div class="text-xs text-gray-600 mb-2">
                                {{ Str::limit($item->description, 50) }}
                            </div>

                            {{-- WHATSAPP --}}
                            @if($item->user && $item->user->phone_number)

                                @php
                                    // Convert 08xxxx → 628xxxx
                                    $wa = preg_replace('/^0/', '62', $item->user->phone_number);
                                @endphp

                                <a href="https://wa.me/{{ $wa }}"
                                target="_blank"
                                class="flex items-center text-green-600 text-sm hover:text-green-700">

                                    {{-- Ikon WhatsApp --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M20.52 3.48A11.8 11.8 0 0 0 12.04 0C5.64 0 .44 5.17.44 11.54c0 2.03.53 4.02
                                        1.55 5.75L0 24l6.91-1.82a11.6 11.6 0 0 0 5.14 1.26h.01c6.39 0 11.6-5.17
                                        11.6-11.54a11.4 11.4 0 0 0-3.14-8.42zm-8.48 17.7h-.01a9.7 9.7 0 0 1-4.94-1.36l-.35-.21-4.1
                                        1.08 1.09-4-.22-.37a9.45 9.45 0 0 1-1.48-5.1c0-5.24 4.27-9.5 9.53-9.5a9.44 9.44 0 0
                                        1 6.73 2.79 9.36 9.36 0 0 1 2.79 6.7c0 5.24-4.27 9.52-9.54 9.52zm5.26-7.1c-.29-.15-1.72-.85-1.99-.95-.27-.1-.47-.15-.67.15-.2.29-.77.95-.94
                                        1.14-.17.2-.35.22-.64.07-.29-.15-1.22-.45-2.32-1.43a8.32 8.32 0 0 1-1.54-1.9c-.16-.28-.02-.43.12-.57.13-.13.29-.34.43-.51.15-.17.2-.29.3-.49.1-.2.05-.37-.03-.52-.08-.15-.67-1.6-.92-2.18-.24-.58-.48-.5-.67-.5h-.57c-.2
                                        0-.52.07-.79.37-.27.29-1.04 1.02-1.04 2.5 0 1.48 1.07 2.91 1.22 3.11.15.2
                                        2.11 3.36 5.1 4.6.71.31 1.27.49 1.7.63.71.23 1.36.2 1.87.12.57-.08
                                        1.72-.7 1.97-1.38.25-.68.25-1.26.17-1.38-.07-.12-.27-.2-.56-.35z"/>
                                    </svg>
                                </a>

                            @endif

                        </div>
                    </div>




                @empty

                    {{-- Placeholder jika tidak ada data --}}
                    <div class="bg-[#f1e5d0] shadow rounded-lg h-40 flex items-center justify-center text-[#735353]">
                        <span class="opacity-70">Belum ada data</span>
                    </div>

                @endforelse

            </div>
        </div>
    @endforeach



    {{-- ========================================================= --}}
    {{--                    BARANG DITEMUKAN                      --}}
    {{-- ========================================================= --}}
    <h2 class="text-2xl font-bold text-[#735353] mb-4">Barang Ditemukan</h2>

    @foreach($categories as $cat)
        <div id="ditemukan-{{ strtolower($cat) }}"
            class="mb-12 p-4 rounded-lg transition
            @if($highlight == $cat) bg-[#73535314] border border-[#73535350] @endif">

            <h3 class="text-xl font-semibold text-[#735353] mb-4">{{ $cat }}</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @forelse($data[$cat]['found'] as $item)

                    {{-- Card jika ada data --}}
                    <div class="bg-white shadow rounded-lg overflow-hidden item-card search-item"
                        data-title="{{ strtolower($item->title) }}"
                        data-desc="{{ strtolower($item->description) }}">

                        <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}"
                            class="h-40 w-full object-cover" alt="">

                        <div class="p-3">
                            <div class="font-bold text-sm">{{ $item->title }}</div>
                            <div class="text-xs text-gray-600 mb-1">
                                {{ Str::limit($item->description, 50) }}
                            </div>
                            <div class="text-right text-sm">⭕</div>
                        </div>
                    </div>

                @empty

                    {{-- Placeholder jika tidak ada data --}}
                    <div class="bg-[#f1e5d0] shadow rounded-lg h-40 flex items-center justify-center text-[#735353]">
                        <span class="opacity-70">Belum ada data</span>
                    </div>

                @endforelse

            </div>
        </div>
    @endforeach

</div>


{{-- AUTO SCROLL KE KATEGORI YANG DIKLIK --}}
@if($highlight)
<script>
    setTimeout(() => {
        const section = document.getElementById("hilang-{{ strtolower($highlight) }}");
        if (section) {
            section.scrollIntoView({ behavior: "smooth", block: "center" });
        }
    }, 300);
</script>
@endif

<script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();
        let items = document.querySelectorAll(".search-item");

        items.forEach(item => {
            let title = item.dataset.title;
            let desc = item.dataset.desc;

            if (title.includes(keyword) || desc.includes(keyword)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
</script>


@endsection
