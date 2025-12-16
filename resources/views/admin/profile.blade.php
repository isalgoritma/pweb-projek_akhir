@extends('layouts.admin')

@section('content')
<div class="max-w-xl mx-auto text-center mt-16">

    <div class="bg-[#f7efe3] p-6 rounded-3xl mb-10">
        <div class="text-xl font-semibold">{{ Auth::user()->username }}</div>
        <div class="text-sm">{{ Auth::user()->email }}</div>
    </div>

    <div class="space-y-6">
        <a href="{{ route('admin.users') }}"
           class="block bg-[#735353] text-white py-4 rounded-full">
            Kelola Pengguna
        </a>

        <a href="{{ route('admin.items') }}"
           class="block bg-[#735353] text-white py-4 rounded-full">
            Kelola Barang
        </a>
    </div>

</div>
@endsection
