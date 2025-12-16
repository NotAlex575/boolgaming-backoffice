@extends('layouts.app')

@section("title")
    Vedi il videogioco di {{ $videogame->nome }}
@endsection

@section('content')


<div class="container mt-5">

    <!-- Card Videogioco -->
    <div class="card shadow-lg bg-dark text-light border border-info">
        <div class="card-body p-4">

            <!-- Nome videogioco -->
            <h1 class="card-title mb-3 text-info">Nome Videogioco: {{ $videogame->nome }}</h1>

            <!-- Franchise -->
            <h4 class="card-subtitle mb-4 text-warning">{{ $videogame->franchise->franchise_name }}</h4>
            

            <hr class="border-info">

            <!-- Trailer Video (mostrato solo se esiste un URL) -->
            @if($videogame->trailer)

                @php
                    // URL del trailer salvato nel database
                    $trailerUrl = $videogame->trailer;

                    // Rimuove tutti i parametri dopo "&"
                    // Equivalente a: split("&")[0] in JavaScript
                    $cleanUrl = explode('&', $trailerUrl)[0];

                    // Verifica se l'URL appartiene a YouTube
                    $isValidYouTube =
                        str_contains($cleanUrl, 'youtube.com') ||
                        str_contains($cleanUrl, 'youtu.be');

                    // Se il link è YouTube, genera l'URL di embed
                    if ($isValidYouTube) {

                        // Caso URL classico: youtube.com/watch?v=ID
                        if (str_contains($cleanUrl, 'watch?v=')) {
                            $embedUrl = str_replace(
                                'watch?v=',
                                'embed/',
                                $cleanUrl
                            );

                        // Caso URL corto: youtu.be/ID
                        } elseif (str_contains($cleanUrl, 'youtu.be/')) {
                            $embedUrl = str_replace(
                                'youtu.be/',
                                'www.youtube.com/embed/',
                                $cleanUrl
                            );
                        }

                    // Se NON è YouTube, l'embed non viene creato
                    } else {
                        $embedUrl = null;
                    }
                @endphp

                <div class="mt-4 text-center">
                    <h5 class="text-warning mb-2">Trailer</h5>

                    <!-- Contenitore responsive 16:9 -->
                    <div class="ratio ratio-16x9 position-relative">

                        <!-- Se l'URL è valido, mostra l'iframe -->
                        @if($isValidYouTube && $embedUrl)
                            <iframe
                                src="{{ $embedUrl }}"  
                                title="Trailer di {{ $videogame->nome }}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe><!-- src="{{ $embedUrl }}" -> URL YouTube embed -->

                        <!-- Altrimenti mostra immagine di fallback -->
                        @else
                            <img
                                src="{{ asset('wasted/wasted-putther.gif') }}"
                                class="img-fluid rounded shadow border border-info"
                                style="max-height: 600px;"
                                alt="Trailer non disponibile">

                            <div class="text-warning fw-bold mt-2">
                                Video non trovato o link inserito male....
                            </div>
                        @endif

                    </div>
                </div>
            @endif

            
            <!-- Immagine -->
            
            @if ($videogame->immagine)
                <div class="d-flex justify-content-center mt-5">
                    <img src="{{ asset("storage/". $videogame->immagine) }}" alt="copertina" class="img-fluid rounded mb-3 border border-info">
                </div>
            @endif

            <!-- Prezzo -->

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
            
            <!-- Pegi -->
            <h5 class="card-subtitle mt-2 mb-4 text-info">Pegi: {{ $videogame->pegi }}</h5>

            <!-- Data di rilascio -->
            <p class="mb-3">
                <strong>Data di rilascio</strong> {{ $videogame->release_date }}
            </p>

            <hr class="border-info">

            <!-- Descrizione -->
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

    <!-- Torna alla index -->
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

    rockAudio.volume = 0.005;      
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
