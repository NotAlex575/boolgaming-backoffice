<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vite (JS app) -->
    @vite(['resources/js/app.js'])
</head>
<body class="bg-dark text-light">
    <div id="app" class="d-flex flex-column min-vh-100">

        <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-info">
                <div class="container d-flex justify-content-between align-items-end">
                    <!-- Logo a sinistra -->
                    <a class="navbar-brand d-flex align-items-end" href="{{ url('/') }}">
                        <span class="ms-2 fw-bold">Boolgaming_BACKOFFICE</span>
                    </a>

                    <!-- Link a destra -->
                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-end">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            @guest
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                                @if(Route::has('register'))
                                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @else
                                <li class="nav-item ms-2">
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="flex-grow-1 py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>

            <footer class="py-3 bg-dark border-top">
                <div class="container d-flex justify-content-between small text-muted">
                    <div>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}</div>
                    <div>Admin Panel · Videogame</div>
                </div>
            </footer>
        </div>

        <!-- Bootstrap JS bundle (CDN) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
