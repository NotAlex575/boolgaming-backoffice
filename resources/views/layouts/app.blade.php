<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>

<body class="bg-dark text-light">
<div id="app" class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom border-info">
        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Boolgaming_BACKOFFICE
            </a>

            <!-- HAMBURGER (MOBILE) -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse justify-content-end"
                 id="navbarSupportedContent">

                <ul class="navbar-nav align-items-md-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/chi_sono') }}">Chi sono</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                    Register
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item ms-md-3 mt-2 mt-md-0">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="btn btn-outline-light btn-sm">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN -->
    <main class="flex-grow-1 py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-light py-4 mt-auto border-top border-info">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">

            <!-- Copyright -->
            <div class="mb-3 mb-md-0">
                © {{ date('Y') }}Boolgaming_Alex575
            </div>

            <!-- Social Links -->
            <div class="d-flex gap-3">
                <a href="https://www.facebook.com/alessandro.agnello.794/" target="_blank"
                class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px; height:40px;">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="https://www.instagram.com/notalex575_/" target="_blank"
                class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px; height:40px;">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://github.com/NotAlex575" target="_blank"
                class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center"
                style="width:40px; height:40px;">
                    <i class="bi bi-github"></i>
                </a>
            </div>

        </div>
    </footer>



</div>

</body>
</html>
