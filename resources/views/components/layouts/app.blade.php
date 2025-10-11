<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Home' }}</title>


    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    @vite(
        ['resources/css/app.css', 'resources/js/app.js']
    )
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/4.1.13/lib.min.js" integrity="sha512-LBqpfYKfymp3VEoHOQharES5j6UyXzUP0Td5jk5j1Ekm9tsbAoGUi5VaGA+0gdAlqKvAUb+7iFBe6qQQ7Jwk0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    {{-- Flowbite --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'SUSE Mono', monospace;
        }
    </style>

    {{-- Font Awesome --}}

    <script src="https://kit.fontawesome.com/d890c03bb3.js" crossorigin="anonymous"></script>

    @yield('styles')
    @livewireStyles
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

    @livewireScripts
</body>
</html>