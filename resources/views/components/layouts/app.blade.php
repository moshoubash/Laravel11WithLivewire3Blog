<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Home' }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=SUSE+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'SUSE Mono', monospace;
            }
        </style>

        <script src="https://kit.fontawesome.com/d890c03bb3.js" crossorigin="anonymous"></script>

        @yield('styles')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3 mb-3 d-flex justify-content-between" style="margin-bottom: 0 !important;">
            <a href="{{ route('home') }}">Home</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Link 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Link 2</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Link 3</a></li>
            </ul>
            
            {{-- authentication buttons --}}

            <div>
                @auth
                    <span class="me-2">Welcome, {{ auth()->user()->name }}!</span>
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light btn-sm">Register</a>
                @endauth
            </div>
        </nav>
        <div class="bg-gray-200">
            {{ $slot }}
        </div>
        <footer class="bg-dark text-white text-center p-3 mt-3" style="margin-top: 0 !important;">
            &copy; {{ date('Y') }} Blog
        </footer>

        @yield('scripts')
    </body>
</html>
