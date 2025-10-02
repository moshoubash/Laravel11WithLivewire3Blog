<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3 mb-3 d-flex justify-content-between" style="margin-bottom: 0 !important;">
            <a href="{{ route('home') }}">Home</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Link 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Link 2</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Link 3</a></li>
            </ul>
        </nav>
        <div class="bg-gray-200">
            {{ $slot }}
        </div>
        <footer class="bg-dark text-white text-center p-3 mt-3" style="margin-top: 0 !important;">
            &copy; {{ date('Y') }} Blog
        </footer>
    </body>
</html>
