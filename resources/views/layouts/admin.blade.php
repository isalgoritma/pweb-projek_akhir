<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - UniVerse</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">

    {{-- HEADER ADMIN --}}
    <header style="background:#f7efe3;">
        <div class="container mx-auto flex justify-between items-center px-8 py-4">
            <div class="text-2xl font-bold text-[#735353]">
                UniVerse <span class="text-sm">(Admin)</span>
            </div>

            <div class="flex items-center gap-4">
                <div class="bg-white px-4 py-2 rounded-full flex items-center gap-2">
                    <span>{{ Auth::user()->username }}</span>
                    <span class="text-xs text-green-600">Aktif</span>
                </div>

                <a href="{{ route('logout') }}"
                   class="bg-[#735353] text-white px-4 py-2 rounded-lg">
                    Logout
                </a>
            </div>
        </div>
    </header>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
