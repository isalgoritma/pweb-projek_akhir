@extends('layouts.dashboard')

@section('title', 'Hapus Barang')

@section('content')

<link rel="stylesheet" href="{{ asset('css/deletepage.css') }}">

<div class="delete-container">

    {{-- SECTION: BARANG HILANG --}}
    <div class="section-box">
        <h2 class="section-title">Barang Hilang</h2>
        <p class="section-subtitle">Hapus barang yang dilaporkan hilang</p>
    </div>

    <div class="card-grid">
        @forelse($lostItems as $item)
            <div class="item-card">

                <div class="card-img">
                    <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}">
                </div>

                <div class="card-info">
                    <h4>{{ $item->title }}</h4>
                    <p>{{ $item->location }}</p>
                </div>

                <form action="{{ route('lost.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">🗑</button>
                </form>

            </div>
        @empty
            <p class="empty-text">Tidak ada barang hilang.</p>
        @endforelse
    </div>

    {{-- SECTION: BARANG DITEMUKAN --}}
    <div class="section-box mt-10">
        <h2 class="section-title">Barang Ditemukan</h2>
        <p class="section-subtitle">Hapus barang yang telah ditemukan</p>
    </div>

    <div class="card-grid">
        @forelse($foundItems as $item)
            <div class="item-card">

                <div class="card-img">
                    <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}">
                </div>

                <div class="card-info">
                    <h4>{{ $item->title }}</h4>
                    <p>{{ $item->location }}</p>
                </div>

                <form action="{{ route('lost.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn">🗑</button>
                </form>

            </div>
        @empty
            <p class="empty-text">Tidak ada barang ditemukan.</p>
        @endforelse
    </div>

</div>

@endsection
