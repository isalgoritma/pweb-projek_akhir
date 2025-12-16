@extends('layouts.dashboard')

@section('title', 'Tambah Barang Hilang')

@section('content')

<link rel="stylesheet" href="{{ asset('css/lostcreate.css') }}">

<div class="form-container">

    <div class="form-title-box">
        <h2 class="text-2xl font-bold text-[#735353]">Form Tambah Barang Hilang</h2>
        <p class="text-[#735353] mt-1">Laporkan barang yang hilang dengan mengisi form berikut</p>
    </div>

    {{-- formnya --}}
    <form action="{{ route('lost.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="lost">

        <div class="form-grid">

            {{-- foto barang --}}
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

            {{-- detail --}}
            <div>
                <h3 class="font-semibold mb-3 text-[#735353]">Detail Barang</h3>

                <p class="text-[#735353] font-semibold">Nama Barang</p>
                <input type="text" name="title" class="input-box" required>

                <p class="text-[#735353] font-semibold mt-4">Kategori</p>
                <select name="category" class="input-box" required>
                    <option>Elektronik</option>
                    <option>Kendaraan</option>
                    <option>Aksesoris</option>
                    <option>Dokumen</option>
                    <option>Lainnya</option>
                </select>

                <p class="text-[#735353] font-semibold mt-4">Deskripsi</p>
                <textarea name="description" class="textarea-box"></textarea>

                <p class="text-[#735353] font-semibold mt-4">Tanggal Kehilangan</p>
                <input type="date" name="date_lost" class="input-box">

                <p class="text-[#735353] font-semibold mt-4">Lokasi Kehilangan</p>
                <input type="text" name="location" class="input-box">
            </div>

        </div>

        <button class="btn-submit mx-auto block">Laporkan Barang Hilang</button>

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
