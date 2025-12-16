<footer class="mt-16 py-6" style="background:#f7efe3;">
    <div class="container mx-auto px-6 flex justify-between items-center">

        <p class="text-sm" style="color:#735353;">
            Platform untuk mencari dan menemukan barang hilang
        </p>

        @if(auth()->user()->role === 'user')
            <a href="https://wa.me/6285810924929" target="_blank" rel="noopener noreferrer"
            class="inline-flex items-center px-5 py-2 rounded-full bg-[#25D366] hover:bg-[#1ebe5a] text-white text-sm font-medium shadow-md transition">

                {{-- Ikon WhatsApp SVG --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M20.52 3.48A11.8 11.8 0 0 0 12.04 0C5.64 0 .44 5.17.44 11.54c0 2.03.53 4.02 1.55 5.75L0 24l6.91-1.82a11.6 11.6 0 0 0 5.14 1.26h.01c6.39 0 11.6-5.17 11.6-11.54a11.4 11.4 0 0 0-3.14-8.42zm-8.48 17.7h-.01a9.7 9.7 0 0 1-4.94-1.36l-.35-.21-4.1 1.08 1.09-4-.22-.37a9.45 9.45 0 0 1-1.48-5.1c0-5.24 4.27-9.5 9.53-9.5a9.44 9.44 0 0 1 6.73 2.79 9.36 9.36 0 0 1 2.79 6.7c0 5.24-4.27 9.52-9.54 9.52zm5.26-7.1c-.29-.15-1.72-.85-1.99-.95-.27-.1-.47-.15-.67.15-.2.29-.77.95-.94 1.14-.17.2-.35.22-.64.07-.29-.15-1.22-.45-2.32-1.43a8.32 8.32 0 0 1-1.54-1.9c-.16-.28-.02-.43.12-.57.13-.13.29-.34.43-.51.15-.17.2-.29.3-.49.1-.2.05-.37-.03-.52-.08-.15-.67-1.6-.92-2.18-.24-.58-.48-.5-.67-.5h-.57c-.2 0-.52.07-.79.37-.27.29-1.04 1.02-1.04 2.5 0 1.48 1.07 2.91 1.22 3.11.15.2 2.11 3.36 5.1 4.6.71.31 1.27.49 1.7.63.71.23 1.36.2 1.87.12.57-.08 1.72-.7 1.97-1.38.25-.68.25-1.26.17-1.38-.07-.12-.27-.2-.56-.35z"/>
                </svg>

                Hubungi Admin
            </a>
        @endif

    </div>
</footer>
