@extends('layouts.dashboard')

@section('title', 'Hapus Barang')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/deletepage.css') }}">
@endpush

@section('content')

<div class="delete-header">
    <h1 class="delete-title">Hapus Barang</h1>
    <p class="delete-subtitle">
        Kelola dan hapus barang hilang atau ditemukan
    </p>
</div>

<div class="delete-page">
    <div class="delete-container">

        <div class="section-box">
            <h2 class="section-title">Barang Hilang</h2>
            <p class="section-subtitle">Hapus barang yang dilaporkan hilang</p>

            @if($lostItems->isEmpty())
                <p class="empty-text">Tidak ada barang hilang.</p>
            @else
                <div class="item-grid">
                    @foreach($lostItems as $item)
                        <div class="item-card">

                            <div class="item-image">
                                <img src="{{ $item->image_path
                                    ? asset('storage/'.$item->image_path)
                                    : asset('images/default-item.png') }}">
                            </div>

                            <div class="item-body">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->location }}</p>
                            </div>

                            <form action="{{ route('lost.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="delete-icon">🗑️</button>
                            </form>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="section-box">
            <h2 class="section-title">Barang Ditemukan</h2>
            <p class="section-subtitle">Hapus barang yang telah ditemukan</p>

            @if($foundItems->isEmpty())
                <p class="empty-text">Tidak ada barang ditemukan.</p>
            @else
                <div class="item-grid">
                    @foreach($foundItems as $item)
                        <div class="item-card">

                            <div class="item-image">
                                <img src="{{ $item->image_path
                                    ? asset('storage/'.$item->image_path)
                                    : asset('images/default-item.png') }}">
                            </div>

                            <div class="item-body">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->location }}</p>
                            </div>

                            <form action="{{ route('lost.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="delete-icon">🗑️</button>
                            </form>

                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
