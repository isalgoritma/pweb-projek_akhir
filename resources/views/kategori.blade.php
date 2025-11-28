@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-4">
    {{ $type == 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }} - {{ $category }}
</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    @forelse($items as $item)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $item->image_path) }}"
                 class="h-40 w-full object-cover" alt="">

            <div class="p-4">
                <h3 class="font-semibold text-lg">{{ $item->title }}</h3>
                <p class="text-sm text-gray-600">{{ Str::limit($item->description, 80) }}</p>

                <a href="{{ route('lost.show', $item->id) }}"
                   class="text-blue-600 hover:underline text-sm">
                    Detail…
                </a>
            </div>
        </div>
    @empty
        <p class="text-gray-600">Tidak ada data dalam kategori ini.</p>
    @endforelse

</div>

<div class="mt-6">
    {{ $items->links() }}
</div>

@endsection
