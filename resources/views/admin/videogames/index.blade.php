@extends('layouts.app')

@section("title")
    Lista Videogiochi
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-light mb-4">Tutti i videogiochi</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-dark text-light align-middle">
            <thead class="table-dark text-info">
                <tr>
                    <th>Videogioco</th>
                    <th>Pegi</th>
                    <th>Data di rilascio</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videogames as $videogame)
                    <tr>
                        <td>{{ $videogame["nome"] }}</td>
                        <td>{{ $videogame["pegi"] }}</td>
                        <td>{{ $videogame["release_date"] }}</td>
                        <td>
                            <a class="btn btn-outline-info btn-sm" href="{{ route('admin.videogames.show', $videogame->id) }}">Link</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a class="btn btn-outline-success mt-3" href="{{ route("admin.videogames.create") }}">Crea nuovo videogioco</a>
</div>
@endsection
