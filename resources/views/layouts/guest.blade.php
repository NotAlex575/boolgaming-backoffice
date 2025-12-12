<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Auth</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>
<body class="bg-dark text-light">

    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="card bg-secondary text-light border-info shadow">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                <!-- Logo o icona -->
                                <svg viewBox="0 0 651 192" width="80" fill="#0dcaf0" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                    <!-- inserisci svg -->
                                </svg>
                                <h3 class="card-title mt-2">Area Riservata</h3>
                                <p class="text-muted small">Accedi al pannello di controllo</p>
                            </div>

                            <!-- Slot per contenuto (es. form login/register) -->
                            <div>
                                {{ $slot }}
                            </div>

                            <div class="mt-3 text-center">
                                <a href="{{ url('/') }}" class="btn btn-outline-info btn-sm">Torna alla Home</a>
                            </div>
                        </div>
                    </div>

                    <p class="text-center text-muted small mt-3">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS bundle (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
