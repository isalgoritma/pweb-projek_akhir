@extends('layouts.dashboard')

@section('title', 'Data Barang')

@section('content')
<div style="padding: 40px 80px 0 80px;">
    <h1 style="font-size:28px; font-weight:800; color:#735353; margin-bottom:18px;">Data Barang</h1>

    <div style="background:#f7efe3; border-radius:20px; padding:24px;">
        <h2 style="font-size:20px; font-weight:700; color:#6b4b3e;">Barang Hilang</h2>
        <p style="color:#6b4b3e; margin-bottom:14px;">Semua laporan barang hilang</p>

        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:20px; margin-bottom:30px;">
            @forelse($lostItems as $item)
                <div style="background:#fffaf3; border-radius:14px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.12);">
                    <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}"
                         style="width:100%; height:150px; object-fit:cover; background:#efe6dc;">
                    <div style="padding:12px;">
                        <div style="font-weight:800;">{{ $item->title }}</div>
                        <div style="font-size:12px; color:#666;">{{ $item->location }}</div>
                        <form action="{{ route('admin.items.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Hapus barang ini?')"
                            style="margin-top:10px; text-align:right;">
                            @csrf
                            @method('DELETE')

                            <button style="background:#d9534f; color:#fff;
                                        padding:6px 12px; border-radius:6px; font-size:12px;">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="font-style:italic; color:#777;">Tidak ada barang hilang.</p>
            @endforelse
        </div>

        <h2 style="font-size:20px; font-weight:700; color:#6b4b3e;">Barang Ditemukan</h2>
        <p style="color:#6b4b3e; margin-bottom:14px;">Semua laporan barang ditemukan</p>

        <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:20px;">
            @forelse($foundItems as $item)
                <div style="background:#fffaf3; border-radius:14px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.12);">
                    <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}"
                         style="width:100%; height:150px; object-fit:cover; background:#efe6dc;">
                    <div style="padding:12px;">
                        <div style="font-weight:800;">{{ $item->title }}</div>
                        <div style="font-size:12px; color:#666;">{{ $item->location }}</div>
                        <form action="{{ route('admin.items.destroy', $item->id) }}"
                            method="POST"
                            onsubmit="return confirm('Hapus barang ini?')"
                            style="margin-top:10px; text-align:right;">
                            @csrf
                            @method('DELETE')

                            <button style="background:#d9534f;color:#fff;
                                        padding:6px 12px;border-radius:6px;font-size:12px;">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="font-style:italic; color:#777;">Tidak ada barang ditemukan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
