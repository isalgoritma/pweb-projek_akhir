<header class="shadow" style="background:#f7efe3;">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">

        <div class="text-2xl font-bold" style="font-family: 'Georgia', serif; color:#735353;">
            UniVerse
        </div>

        <nav class="hidden md:flex items-center space-x-8">
            <a href="/dashboard"
                class="font-medium text-[#735353] pb-1 border-b-2
                {{ request()->is('dashboard') ? 'border-[#735353]' : 'border-transparent hover:border-[#735353]' }}">
                Utama
            </a>

           <a href="{{ route('lost.found.all') }}"
                class="font-medium text-[#735353] pb-1 border-b-2
                {{ request()->is('barang-hilang-ditemukan') || request()->is('barang-hilang-ditemukan/*')
                    ? 'border-[#735353]'
                    : 'border-transparent hover:border-[#735353]' }}">
                Barang Hilang & Ditemukan
            </a>

        </nav>

        <div class="flex items-center gap-3">

            <div class="flex items-center space-x-2 px-2 py-2 bg-white rounded-full shadow-sm">

                {{-- Ikon Akun --}}
                <a href="
                {{ Auth::user()->role === 'admin' && Route::has('admin.profile')
                    ? route('admin.profile')
                    : (Route::has('profile') ? route('profile') : '#') }}">
                    Profil
                </a>

                <a href="
                {{ Auth::user()->role === 'admin' && Route::has('admin.profile')
                    ? route('admin.profile')
                    : (Route::has('profile') ? route('profile') : '#') }}"
                    class="flex items-center space-x-2 px-4 py-2 rounded-full shadow-sm
                    {{ request()->is('profile') ? 'bg-[#e8d8c8]' : 'bg-white' }}">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6 text-[#735353]"
                        fill="currentColor"
                        viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0-3-3 3 3 0 0 0 3 3Zm0 1c-2.67 0-8 1.34-8 4v1h16v-1c0-2.66-5.33-4-8-4Z"/>
                    </svg>

                    <div>
                        <div class="text-sm font-semibold text-[#735353]">
                            {{ Auth::user()->username }}
                        </div>
                        <div class="text-xs text-[#735353]">Aktif</div>
                    </div>
                </a>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="px-4 py-2 rounded-lg font-medium text-white"
                        style="background:#735353;">
                    Logout
                </button>
            </form>

        </div>

    </div>
</header>
