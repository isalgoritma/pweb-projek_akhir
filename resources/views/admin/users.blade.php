@extends('layouts.dashboard')

@section('title', 'Data User')

@section('content')
<div style="padding: 120px 80px;">
    <h1 style="font-size:28px; font-weight:800; color:#735353; margin-bottom:18px;">Data User</h1>

    @if(session('success'))
        <div style="background:#e9f7ef; padding:10px 14px; border-radius:10px; margin-bottom:14px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse:collapse; background:#fff;">
        <thead>
            <tr style="background:#f7efe3;">
                <th style="padding:12px; text-align:left;">Nama</th>
                <th style="padding:12px; text-align:left;">Username</th>
                <th style="padding:12px; text-align:left;">Email</th>
                <th style="padding:12px; text-align:left;">Status</th>
                <th style="padding:12px; text-align:left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:12px;">{{ $user->name }}</td>
                <td style="padding:12px;">{{ $user->username }}</td>
                <td style="padding:12px;">{{ $user->email }}</td>
                <td style="padding:12px;">
                    {{ $user->is_active ? 'Aktif' : 'Nonaktif' }}
                </td>
                <td style="padding:12px; display:flex; gap:8px;">
                    <form action="{{ route('admin.users.toggle', $user) }}" method="POST">
                        @csrf
                        <button type="submit"
                            style="background:#d9534f;color:#fff;border:none;padding:6px 10px;border-radius:6px;">
                            {{ $user->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.users.reset', $user) }}" method="POST"
                        onsubmit="return confirm('Reset password user ini?')">
                        @csrf
                        <button type="submit"
                            style="background:#6c757d;color:#fff;border:none;padding:6px 10px;border-radius:6px;">
                            Reset Password
                        </button>
                    </form>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
