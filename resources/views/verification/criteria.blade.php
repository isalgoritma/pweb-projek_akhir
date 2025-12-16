@extends('layouts.dashboard')

@section('title', 'Konfirmasi Kriteria')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/criteria.css') }}">
@endpush

@section('content')

<div class="criteria-page">

    <!-- HEADER -->
    <div class="criteria-header">
        <h2>Konfirmasi Kriteria</h2>
        <p>
            Verifikasi apakah barang ini milik anda sesuai dengan mencocokkan
            detail dibawah ini
        </p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- CONTENT -->
    <div class="criteria-content">

        <!-- LEFT : FOTO -->
        <div class="criteria-left">
            <h3>Foto Barang Ditemukan</h3>

            <div class="photo-box">
                <img src="{{ asset('images/default-item.png') }}" alt="Foto Barang">
                <span>Foto akan muncul di sini</span>
            </div>

            <button class="btn-confirm">Konfirmasi</button>
            <button class="btn-reject">Tolak</button>
        </div>

        <!-- RIGHT : DETAIL -->
        <div class="criteria-right">
            <h3>Detail Verifikasi Barang</h3>

            <div class="form-group">
                <label>Nama Barang</label>
                <div class="form-box"></div>
            </div>

            <div class="form-group">
                <label>Ciri - Ciri</label>
                <div class="form-box tall"></div>
            </div>

            <div class="form-group">
                <label>Tanggal Kehilangan</label>
                <div class="form-box"></div>
            </div>

            <div class="form-group">
                <label>Lokasi Kehilangan</label>
                <div class="form-box"></div>
            </div>

            <div class="form-group">
                <label>Merek</label>
                <div class="form-box"></div>
            </div>

            <div class="form-group">
                <label>Warna</label>
                <div class="form-box"></div>
            </div>
        </div>

    </div>

</div>

@endsection
