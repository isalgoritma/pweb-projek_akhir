@extends('layouts.dashboard')
@section('title', 'Dashboard Universe')

@section('content')

<style>
    :root {
        --brown: #735353;
        --cream: #f7efe3;
        --cream-soft: #f4ebdf;
        --white: #ffffff;
        --hero-margin-top: 20px;
        --hero-margin-bottom: 50px;
    }

    body {
        background: var(--white) !important;
    }

    .hero-box {
        width: 100%;
        background: var(--cream);
        border-radius: 15px;
        overflow: hidden;
        margin-top: 40px;
        margin-bottom: 40px;
        position: relative;
        height: 650px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);

        margin-top: var(--hero-margin-top) !important;
        margin-bottom: var(--hero-margin-bottom) !important;
    }

    .hero-bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* margin-top: 5px; */
        opacity: .2;
    }
    .hero-text {
        position: absolute;
        top: 50%;
        left: 7%;
        transform: translateY(-50%);
        max-width: 700px;
    }

    .hero-title {
        color: var(--brown);
        font-size: 48px;
        font-weight: bold;
    }

    .hero-title span {
        white-space: nowrap;
    }

    #typing-text {
        border-right: 3px solid #735353;
        padding-right: 5px;
        animation: blinkCursor .7s infinite;
    }

    @keyframes blinkCursor {
        0% { border-color: transparent; }
        50% { border-color: #735353; }
        100% { border-color: transparent; }
    }

    .hidden-universe {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .show-universe {
        opacity: 1;
    }

    .hidden-subtitle {
        opacity: 0;
        transition: opacity 0.8s ease-in-out;
    }

    .show-subtitle {
        opacity: 1;
    }


    .hero-subtitle {
        color: var(--brown);
        font-size: 20px;
    }

    /* title section */
    .section-title {
        color: var(--brown);
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 40px;
        margin-left: 5px;
    }

    /* card */
    .kategori-card {
        width: 200px;
        height: 210px;
        background: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: .2s;
    }
    .kategori-card:hover {
        transform: translateY(-4px);
    }

    .kategori-image {
        width: 100%;
        height: 140px;

        background: var(--cream);
    }

    .kategori-info {
        padding: 8px;
    }

    .kategori-title {
        color: var(--brown);
        font-size: 14px;
        font-weight: 600;
    }

    .kategori-sub {
        color: #b0a7a2;
        font-size: 11px;
    }

    .font-georgia {
        font-family: Georgia, serif;
        font-weight: bold;
        letter-spacing: 0.5px;
    }

</style>


{{-- HERO --}}
<div class="hero-box relative w-full">
    <img src="{{ asset('images/hero.png') }}" class="hero-bg">

    {{-- <div class="hero-overlay"></div> --}}

    <div class="hero-text">
        <h1 class="hero-title">
            <span id="typing-text"></span>
            <br>
            <span id="universe-line" class="hidden-universe">
                di <span class="font-georgia">Universe</span>
            </span>
        </h1>

        <p id="subtitle" class="hero-subtitle hidden-subtitle">
            Platform untuk mencari dan menemukan barang hilang
        </p>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const username = "{{ Auth::user()->username }}";
    const text = `Selamat datang ${username}`;
    const typingArea = document.getElementById("typing-text");
    const universeLine = document.getElementById("universe-line");
    const subtitle = document.getElementById("subtitle");

    let index = 0;

    function typeEffect() {
        if (index < text.length) {
            typingArea.textContent += text.charAt(index);
            index++;
            setTimeout(typeEffect, 65);
        } else {

            universeLine.classList.add("show-universe");

            setTimeout(() => {
                subtitle.classList.add("show-subtitle");
            }, 400);
        }
    }

    typeEffect();
});
</script>

@php
$categoryImages = [
    'elektronik' => 'images/categories/elektronik.png',
    'kendaraan'  => 'images/categories/kendaraan.png',
    'aksesoris'  => 'images/categories/aksesoris.png',
    'dokumen'    => 'images/categories/dokumen.png',
    'lainnya'    => 'images/categories/lainnya.png',
];
@endphp

{{-- BARANG HILANG --}}
<div class="max-w-7xl mx-auto px-6 mt-10">
    <h2 class="section-title">Barang Hilang</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 mt-4">
        @foreach($categories as $cat)
            <div class="kategori-card bg-[#F5EDE3] rounded-xl shadow-sm overflow-hidden">

                <div class="kategori-image h-28">
                    <img src="{{ asset($categoryImages[$cat['slug']]) }}"
                        class="w-full h-full object-cover">
                </div>


                <div class="p-3">
                    <div class="font-semibold">{{ $cat['name'] }}</div>

                    <a href="{{ route('kategori.hilang', $cat['slug']) }}"
                    class="text-sm text-gray-500 hover:text-[#735353]">
                        Selengkapnya…
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>

@php
$categoryImages = [
    'elektronik' => 'images/categories/Elektronik.jpg',
    'kendaraan'  => 'images/categories/Kendaraan.jpg',
    'aksesoris'  => 'images/categories/Aksesoris.jpg',
    'dokumen'    => 'images/categories/Dokumen.jpg',
    'lainnya'    => 'images/categories/Lainnya.jpg',
];
@endphp

{{-- BARANG DITEMUKAN --}}
<div class="max-w-7xl mx-auto px-6 mt-14">
    <h2 class="section-title mt-10">Barang Ditemukan</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 mt-4">
        @foreach($categories as $cat)
            <div class="kategori-card bg-[#F5EDE3] rounded-xl shadow-sm overflow-hidden">

                <div class="kategori-image h-28">
                    <img src="{{ asset($categoryImages[$cat['slug']]) }}"
                        class="w-full h-full object-cover">
                </div>


                <div class="p-3">
                    <div class="font-semibold">{{ $cat['name'] }}</div>

                    <a href="{{ route('kategori.ditemukan', $cat['slug']) }}"
                    class="text-sm text-gray-500 hover:text-[#735353]">
                        Selengkapnya…
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>

@endsection
