<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Universe')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lost-create.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- tw --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { box-sizing: border-box; margin: 0; padding: 0; height: 100%; display: flex; flex-direction: column; }
        .main-content { flex: 1; overflow-y: auto; padding-bottom: 20px; }
        .header-fixed { position: fixed; top: 0; left: 0; right: 0; z-index: 1000; }
        .footer-fixed { position: fixed; bottom: 0; left: 0; right: 0; z-index: 1000; }
        .content-wrapper { margin-top: 5px; }
        .status-online { width: 8px; height: 8px; background:#10b981; border-radius:50%; margin-left:6px; }
        .banner-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            background: linear-gradient(135deg, #f8e9d7, #f4d7b5);
        }
        .item-card { transition: transform 0.2s; }
        .item-card:hover { transform: translateY(-4px); }
        .status-online {
            width: 8px;
            height: 8px;
            background:#10b981;
            border-radius:50%;
            margin-left:6px;
        }
        /* body {
            background: #f8e9d7;
        } */
    </style>

    @stack('styles')
</head>

<body>

    @include('partials.header')

    <div class="main-content content-wrapper">
        @yield('content')
    </div>

    @include('partials.footer')

    @stack('scripts')

</body>
</html>
