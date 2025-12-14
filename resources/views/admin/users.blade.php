@extends('layouts.dashboard')

@section('content')

<style>
/* ====== WARNA ====== */
body {
    background-color: #fbf6ef;
}

/* ====== CONTAINER ====== */
.admin-wrapper {
    max-width: 1100px;
    margin: 40px auto;
}

/* ====== CARD ====== */
.card-soft {
    background: #f6ede1;
    border-radius: 16px;
    padding: 20px 24px;
    margin-bottom: 20px;
}

/* ====== TITLE ====== */
.title {
    font-weight: 600;
    color: #735353;
}

.subtitle {
    font-size: 14px;
    color: #735353;
    opacity: .8;
}

/* ====== TABLE ====== */
.table-custom {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}

.table-custom th {
    color: #9c7f7f;
    padding: 12px 8px;
    border-bottom: 1px solid #e6d6c3;
}

.table-custom td {
    padding: 14px 8px;
}

.table-custom tr:not(:last-child) {
    border-bottom: 1px solid #eadccc;
}

/* ====== BADGE ====== */
.badge-active {
    background: #bfe4b8;
    color: #2f6b2f;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
}

.badge-deleted {
    background: #e8c1c1;
    color: #7a3c3c;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
}

/* ====== BUTTON ====== */
.btn-delete {
    background: #ff4d4f;
    border: none;
    color: #fff;
    padding: 6px 18px;
    border-radius: 20px;
    font-size: 12px;
}

.btn-delete:hover {
    background: #e04345;
}
</style>

<div class="admin-wrapper">

    {{-- HEADER CARD --}}
    <div class="card-soft">
        <h5 class="title">Kelola Pengguna</h5>
        <p class="subtitle">Lihat dan kelola status semua pengguna sistem</p>
    </div>

    {{-- TABLE CARD --}}
    <div class="card-soft">
        <h6 class="title mb-3">Daftar Pengguna</h6>

        <table class="table-custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $user->username }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->deleted_at)
                            <span class="badge-deleted">Terhapus</span>
                        @else
                            <span class="badge-active">Aktif</span>
                        @endif
                    </td>
                    <td>
                        @if (!$user->deleted_at)
                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">Hapus</button>
                        </form>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
@endsection
