@extends('layouts.app')

@section("title")
    Modifica il Videogioco {{ $videogame->nome }}
@endsection

@section('content')

    <div class="container mt-5">

        <form action="{{ route('admin.videogames.update', $videogame->id) }}" method="post" class="p-4 border rounded shadow-sm bg-dark text-light" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <h4 class="mb-4 text-center text-info">Modifica il Videogioco!</h4>

            <div class="row g-3">

                <!-- Nome videogioco -->
                <div class="col-12">
                    <label for="nome" class="form-label text-warning">Nome videogioco</label>
                    <input type="text" class="form-control bg-secondary text-light border border-info" id="nome" name="nome" value="{{ $videogame->nome }}" required>
                </div>

                <!-- Trailer videogioco -->
                <div class="col-12">
                    <label for="nome" class="form-label text-warning">Link Trailer videogioco</label>
                    <input type="text" class="form-control bg-secondary text-light border border-info" id="trailer" name="trailer" value="{{ $videogame->trailer }}" required>
                </div>

                <!-- Franchise -->
                <div class="col-12">
                    <label for="franchise_id" class="form-label text-warning">Franchise</label>
                    <select name="franchise_id" id="franchise_id" class="form-select bg-secondary text-light border border-info">
                        @foreach ($franchises as $franchise)
                            <option value="{{ $franchise->id }}" {{ $videogame->franchise_id ? "selected" : "" }}>{{ $franchise->franchise_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Consoles -->
                <div class="mb-3 d-flex flex-wrap">
                    @foreach ($consoles as $console)
                        <div class="form-check me-2 mb-2">
                            <input class="form-check-input" 
                                type="checkbox" 
                                name="consoles[]" 
                                value="{{ $console->id }}" 
                                id="console-{{ $console->id }}"
                                {{ $videogame->consoles->contains($console->id) ? "checked" : "" }}>
                            <label class="form-check-label badge text-dark" for="console-{{ $console->id }}"  style="background-color: {{ $console->color }}">
                                {{ $console->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Genres -->
                <div class="mb-3 d-flex flex-wrap">
                    @foreach ($genres as $genre)
                        <div class="form-check me-2 mb-2">
                            <input class="form-check-input" type="checkbox" 
                                name="genres[]" 
                                value="{{ $genre->id }}" 
                                id="genre-{{ $genre->id }}"
                                {{ $videogame->genres->contains($genre->id) ? "checked" : "" }}>>
                            <label class="form-check-label badge text-dark" for="genre-{{ $genre->id }}" style="background-color: {{ $genre->color }}">
                                {{ $genre->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- PEGI -->
                <div class="col-md-6">
                    <label for="pegi" class="form-label text-warning">PEGI</label>
                    <input type="text" class="form-control bg-secondary text-light border border-info" id="pegi" name="pegi" value="{{ $videogame->pegi }}" required>
                </div>

                <!-- Data pubblicazione -->
                <div class="col-md-6">
                    <label for="release_date" class="form-label text-warning">Data pubblicazione</label>
                    <input type="date" class="form-control bg-secondary text-light border border-info" id="release_date" name="release_date" value="{{ $videogame->release_date }}" required>
                </div>

                <!-- Immagine -->
                <div class="col-12">
                    <form class="form-control mb-3 d-flex flex-wrap gap-4" method="post" enctype="multipart/form-data">
                        <label for="immagine" class="form-label text-warning">Immagine del videogioco (non obbligatoria)</label>
                        <input type="file" class="form-control bg-secondary text-light border border-info" id="immagine" name="immagine">

                        <!--mostra l'immagine-->
                        @if ($videogame->immagine)
                            <div class="d-flex justify-content-center mt-5">
                                <img src="{{ asset("storage/". $videogame->immagine) }}" alt="copertina" class="img-fluid rounded mb-3 border border-info">
                            </div>
                        @endif

                    </form>
                    <!--
                    <input type="text" class="form-control bg-secondary text-light border border-info" id="immagine" name="immagine" placeholder="Inserisci il link dell'immagine del videogioco qui" required>
                    -->
                </div>

                <!-- Prezzo -->
                <div class="col-md-12">
                    <label for="prezzo" class="form-label text-warning">Prezzo</label>
                    <input type="number" class="form-control bg-secondary text-light border border-info" id="prezzo" name="prezzo" value="{{ $videogame->prezzo }}" step="0.01" required>
                </div>

                <!-- Descrizione -->
                <div class="col-md-12">
                    <label for="descrizione" class="form-label text-warning">Descrizione videogioco</label>
                    <textarea class="form-control bg-secondary text-light border border-info" name="descrizione" id="descrizione" rows="3" required>{{ $videogame->descrizione }}</textarea>
                </div>

                <!-- Bottoni -->
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5" name="action">Modifica il videogioco</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-center mt-3">
            <a class="btn btn-outline-info px-5" href="{{ route('admin.videogames.index') }}">Torna alla pagina iniziale</a>
        </div>

    </div>
@endsection