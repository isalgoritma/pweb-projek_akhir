@extends('layouts.dashboard')

@section('title', 'Barang Hilang & Ditemukan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lost-all.css') }}">
@endpush

@section('content')

<div class="page-wrapper">

    {{-- Search --}}
    <div class="search-container">
        <input type="text" id="searchInput" class="search-input" placeholder="Cari barang...">
    </div>

    {{-- ================= BARANG HILANG ================= --}}
    <h2 class="main-title">Barang Hilang</h2>

    @foreach($categories as $cat)
    <div class="category-box">

        <h3 class="category-title">{{ $cat }}</h3>

        <div class="items-scroll">

            @forelse($data[$cat]['lost'] as $item)

                <div class="item-card search-item"
                    data-title="{{ strtolower($item->title) }}"
                    data-desc="{{ strtolower($item->description) }}"
                    onclick="window.location.href='{{ route('lost.show', $item->id) }}'">

                    {{-- Gambar --}}
                    <img src="{{ $item->image_path
                        ? asset('storage/'.$item->image_path)
                        : asset('images/default-item.png') }}"
                    class="item-img">

                    {{-- Info --}}
                    <div class="item-info">
                        <p class="item-name">{{ $item->title }}</p>
                        <p class="item-desc">{{ Str::limit($item->description, 40) }}</p>

                        {{-- WA jika barang hilang --}}
                        @if($item->user && $item->user->phone_number)
                            @php $wa = preg_replace('/^0/', '62', $item->user->phone_number); @endphp

                            <a href="https://wa.me/{{ $wa }}" target="_blank" class="wa-icon">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
            <div class="empty-card">
                Belum ada data.
            </div>
            @endforelse
        </div>
    </div>
    @endforeach


    {{-- ================= BARANG DITEMUKAN ================= --}}
    <h2 class="main-title" style="margin-top:50px;">Barang Ditemukan</h2>

    @foreach($categories as $cat)
    <div class="category-box">

        <h3 class="category-title">{{ $cat }}</h3>

        <div class="items-row">

            @forelse($data[$cat]['found'] as $item)

           <div class="item-card search-item"
                data-title="{{ strtolower($item->title) }}"
                data-desc="{{ strtolower($item->description) }}"
                onclick="window.location.href='{{ route('lost.show', $item->id) }}'">


                {{-- Gambar --}}
                <img src="{{ $item->image_path ? asset('storage/'.$item->image_path) : asset('images/default-item.png') }}"
                     class="item-img">

                <div class="item-info">
                    <p class="item-name">{{ $item->title }}</p>
                    <p class="item-desc">{{ Str::limit($item->description, 40) }}</p>

                    {{-- TANDA KONFIRMASI (⭕ awalnya) --}}
                    @if (
                        auth()->check() &&
                        auth()->id() !== $item->user_id &&
                        !$item->verifications()->where('status', 'pending')->exists()
                    )
                        <a href="{{ route('verification.create', $item->id) }}"
                            class="status-icon"
                            title="Ajukan Verifikasi">
                            ⭕
                        </a>
                    @endif
                </div>

            </div>

            @empty
            <div class="empty-card">Belum ada data.</div>
            @endforelse

        </div>
    </div>
    @endforeach

</div>


{{-- SEARCH BAR FUNCTION --}}
<script>
document.getElementById("searchInput").addEventListener("keyup", function () {
    let key = this.value.toLowerCase();
    let items = document.querySelectorAll(".search-item");

    items.forEach(item => {
        let title = item.dataset.title || '';
        let desc  = item.dataset.desc || '';

        if (title.includes(key) || desc.includes(key)) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
});
</script>


@endsection
