@extends('layouts.app')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Daftar Barang Hilang & Ditemukan</h2>
    <a href="{{ route('lost.create') }}" class="btn btn-primary">Tambah Barang</a>
  </div>

  @if(session('success')) <div class="alert alert-success mt-3">{{ session('success') }}</div> @endif

  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>Judul</th><th>Tipe</th><th>Lokasi</th><th>Tanggal</th><th>Status</th><th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $it)
      <tr>
        <td>{{ $it->title }}</td>
        <td>{{ ucfirst($it->type) }}</td>
        <td>{{ $it->location }}</td>
        <td>{{ $it->date_lost }}</td>
        <td>{{ ucfirst($it->status) }}</td>
        <td>
            <a href="{{ route('lost.show', $it->id) }}" class="btn btn-sm btn-info">Lihat</a>

            @if($it->type === 'found')
                <a href="{{ route('verification.create', $it->id) }}"
                    class="btn btn-sm btn-success">
                    Verifikasi
                </a>
            @endif

            <a href="{{ route('lost.edit', $it->id) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('lost.destroy', $it->id) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Hapus item?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>

      </tr>
      @empty
      <tr><td colspan="6" class="text-center">Belum ada data</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $items->links() }}
</div>
@endsection
