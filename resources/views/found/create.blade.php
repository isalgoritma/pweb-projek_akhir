@extends('layouts.dashboard')

@section('title', 'Tambah Barang Ditemukan')

@section('content')

<link rel="stylesheet" href="{{ asset('css/lostcreate.css') }}">

<div class="form-container">

    {{-- Judul --}}
    <div class="form-title-box">
        <h2 class="text-2xl font-bold text-[#735353]">Form Tambah Barang Ditemukan</h2>
        <p class="text-[#735353] mt-1">
            Laporkan barang yang ditemukan dengan mengisi form dibawah ini
        </p>
    </div>

    <form action="{{ route('lost.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="found">

        <div class="form-grid">

            {{-- FOTO --}}
            <div>
                <h3 class="font-semibold mb-3 text-[#735353]">Foto Barang</h3>

                <div class="upload-preview" id="imagePreview">
                    <img id="previewImg" style="display:none">
                </div>

                <label class="btn-upload cursor-pointer">
                    + Upload Gambar
                    <input type="file" name="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                </label>
            </div>

            {{-- DETAIL BARANG --}}
            <div>
                <h3 class="font-semibold mb-3 text-[#735353]">Detail Barang</h3>

                <p class="text-[#735353] font-semibold">Nama Barang</p>
                <input type="text" name="title" class="input-box" required>

                <p class="text-[#735353] font-semibold mt-4">Deskripsi</p>
                <textarea name="description" class="textarea-box"></textarea>

                <p class="text-[#735353] font-semibold mt-4">Tanggal Ditemukan</p>
                <input type="date" name="date_lost" class="input-box">

                <p class="text-[#735353] font-semibold mt-4">Lokasi Ditemukan</p>
                <input type="text" name="location" class="input-box">

                <p class="text-[#735353] font-semibold mt-4">Kategori</p>
                <select name="category" class="input-box" required>
                    <option value="Elektronik">Elektronik</option>
                    <option value="Kendaraan">Kendaraan</option>
                    <option value="Aksesoris">Aksesoris</option>
                    <option value="Dokumen">Dokumen</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

        </div>

        <button class="btn-submit mx-auto block">Laporkan Barang Ditemukan</button>

    </form>

</div>

<script>
function previewImage(event) {
    let img = document.getElementById("previewImg");
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = "block";
}
</script>

@endsection
