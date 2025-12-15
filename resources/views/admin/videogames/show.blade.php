@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Card Videogioco -->
    <div class="card shadow-lg bg-dark text-light border border-info">
        <div class="card-body p-4">

            <h1 class="card-title mb-3 text-info">Nome Videogioco: {{ $videogame->nome }}</h1>
            <h4 class="card-subtitle mb-4 text-warning">{{ $videogame->franchise->franchise_name }}</h4>
            

            <hr class="border-info">

            <!-- Trailer Video con fallback -->
            @if($videogame->trailer)
                @php
                    $trailerUrl = $videogame->trailer;
                    $isValidYouTube = str_contains($trailerUrl, 'youtube.com') || str_contains($trailerUrl, 'youtu.be');
                    $embedUrl = $isValidYouTube ? str_replace('watch?v=', 'embed/', $trailerUrl) : null;
                @endphp

                <div class="mt-4 text-center">
                    <h5 class="text-warning mb-2">Trailer</h5>
                    <div class="ratio ratio-16x9 position-relative">
                        @if($isValidYouTube)
                            <iframe id="trailerFrame"
                                    src="{{ $embedUrl }}" 
                                    title="Trailer di {{ $videogame->nome }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        @else
                            <img src="{{ asset('wasted/wasted-putther.gif') }}" 
                                alt="Trailer non trovato o link inserito male...." 
                                class="img-fluid rounded shadow border border-info" 
                                style="max-height: 600px;">
                            <div class="text-warning fw-bold mt-2">Video non trovato o link inserito male....</div>
                        @endif
                    </div>
                </div>
            @endif

            <img src="{{ $videogame->immagine }}" class="img-fluid rounded mb-3 border border-info">

            <p class="mb-3">
                <strong>Prezzo: </strong> {{ $videogame->prezzo }}
            </p>

            <!-- Consoles -->
            <div class="mb-2">
                @if (count($videogame->consoles) > 0)
                <strong>Console:  </strong>
                    @foreach ($videogame->consoles as $console)
                        <span class="badge text-dark me-1" style="background-color: {{ $console->color }}">{{ $console->nome }}</span>
                    @endforeach
                @endif
            </div>

            <!-- Generi -->
            <div class="mb-2">
                @if (count($videogame->genres) > 0)
                <strong>Generi:  </strong>
                    @foreach ($videogame->genres as $genre)
                        <span class="badge text-dark me-1" style="background-color: {{ $genre->color }}">{{ $genre->nome }}</span>
                    @endforeach
                @endif
            </div>

            <h5 class="card-subtitle mt-2 mb-4 text-info">Pegi: {{ $videogame->pegi }}</h5>

            <p class="mb-3">
                <strong>Data di rilascio</strong> {{ $videogame->release_date }}
            </p>

            <hr class="border-info">

            <p class="card-text fs-5">{{ $videogame->descrizione }}</p>
        </div>

        <!-- Bottoni -->
        <div class="border-top px-4 pb-4 pt-3 d-flex justify-content-center gap-3">
            <a href="{{ route('admin.videogames.edit', $videogame) }}" class="btn btn-warning px-4">
                Modifica il videogioco
            </a>
            <button type="button" class="btn btn-danger px-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Elimina definitivamente
            </button>
        </div>
    </div>

    <a href="{{ route('admin.videogames.index') }}" class="btn btn-outline-info mt-4 px-4">
        Torna indietro alla lista dei videogiochi
    </a>
</div>

<!-- Modal Eliminazione -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light border border-info">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Elimina progetto</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare questo videogioco??
            </div>

            <!-- Audio nascosto -->
            <audio id="theRockSound" src="{{ asset('rock/rocksound.mp3') }}"></audio>

            <!-- GIF Rickroll -->
            <div class="text-center mb-4">
                <img id="rockGif" src="{{ asset('rock/rock.gif') }}" alt="Rickroll" class="img-fluid rounded shadow border border-info" style="max-height: 200px;">
            </div>

            <div class="modal-footer d-flex justify-content-center gap-3">
                <form id="deleteForm" action="{{ route('admin.videogames.destroy', $videogame) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger px-4" value="ELIMINA DEFINITIVAMENTE!">
                </form>
                <button type="button" class="btn btn-outline-info px-4" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script>
    var myModal = document.getElementById('staticBackdrop');
    var rockAudio = document.getElementById('theRockSound');
    var rockGif = document.getElementById('rockGif');

    rockAudio.volume = 0.004;      
    rockAudio.playbackRate = 1.8; 
    rockAudio.loop = true;       

    myModal.addEventListener('shown.bs.modal', function () {
        // Riparte la GIF dall'inizio
        var src = rockGif.src;
        rockGif.src = '';
        rockGif.src = src;
        rockAudio.play();
    });

    myModal.addEventListener('hide.bs.modal', function () {
        rockAudio.pause();
        rockAudio.currentTime = 0;
    });

    document.getElementById('deleteForm').addEventListener('submit', function () {
        rockAudio.pause();
        rockAudio.currentTime = 0;
    });
</script>
@endsection
