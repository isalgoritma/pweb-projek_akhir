@extends('layouts.dashboard')

@section('content')
<style>
    .section-box {
        background: #f7efe3;
        border-radius: 14px;
        padding: 14px 18px;
        margin-bottom: 20px;
    }

    .item-card {
        background: #fdf6eb;
        border-radius: 16px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        padding: 12px;
        position: relative;
    }

    .item-image {
        height: 110px;
        background: #efe3d5;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .item-image img {
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .delete-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: none;
        border: none;
        color: #555;
    }

    .delete-btn:hover {
        color: #d11a1a;
    }
</style>

<div class="container py-5">

    {{-- ================= BARANG HILANG ================= --}}
    <div class="mb-5">
        <div class="section-box">
            <h5 class="mb-1 fw-semibold text-brown">Barang Hilang</h5>
            <small class="text-muted">Hapus barang yang dilaporkan hilang</small>
        </div>

        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-4">
            @foreach ($lostItems as $item)
            <div class="col">
                <div class="item-card">

                    <div class="item-image">
                        @if ($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}">
                        @else
                            <small class="text-muted">No Image</small>
                        @endif
                    </div>

                    <strong class="d-block text-sm text-truncate">
                        {{ $item->name }}
                    </strong>

                    <small class="text-muted d-block text-truncate">
                        {{ $item->location }}
                    </small>

                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                    </small>

                    <form action="{{ route('admin.items.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- ================= BARANG DITEMUKAN ================= --}}
    <div>
        <div class="section-box">
            <h5 class="mb-1 fw-semibold text-brown">Barang Ditemukan</h5>
            <small class="text-muted">Hapus barang yang telah ditemukan</small>
        </div>

        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-4">
            @foreach ($foundItems as $item)
            <div class="col">
                <div class="item-card">

                    <div class="item-image">
                        @if ($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}">
                        @else
                            <small class="text-muted">No Image</small>
                        @endif
                    </div>

                    <strong class="d-block text-sm text-truncate">
                        {{ $item->name }}
                    </strong>

                    <small class="text-muted d-block text-truncate">
                        {{ $item->location }}
                    </small>

                    <small class="text-muted">
                        {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                    </small>

                    <form action="{{ route('admin.items.destroy', $item->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus barang ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>

                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
