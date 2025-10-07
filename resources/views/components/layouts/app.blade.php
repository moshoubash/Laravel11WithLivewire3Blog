<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Home' }}</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    {{-- Flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    @vite(
        ['resources/css/app.css', 'resources/js/app.js']
    )

    <style>
        body {
            font-family: 'SUSE Mono', monospace;
        }
    </style>

    <script src="https://kit.fontawesome.com/d890c03bb3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js"></script>

    <!-- Auto-init Highlight.js -->
    @yield('styles')
</head>

<body>
    {{-- Navbar --}}
    <livewire:navbar />

    <div class="bg-gray-200">
        {{ $slot }}
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-3" style="margin-top: 0 !important;">
        &copy; {{ date('Y') }} Blog
    </footer>

    
    {{-- Flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @yield('scripts')
    
    <script>
        hljs.highlightAll();
    </script>
</body>
</html>