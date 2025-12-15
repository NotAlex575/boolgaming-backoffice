@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-dark text-light rounded-3 shadow-lg border border-primary">
    <div class="container py-5 text-center">
        <div class="logo_laravel mb-4">
            <img src="{{ asset('logo/myself.jpeg') }}" alt="" class="img-fluid w-25">
        </div>


        <h1 class="display-5 fw-bold text-primary mb-2">Backoffice Control Panel <i class="bi bi-controller"></i>
        </h1>
        <h4 class="fw-bold text-primary">Created by: Alessandro Agnello</h4>

        <p class="col-md-8 mx-auto fs-5 mt-3 text-info">
            Gestisci giochi tramite le funzionalità di laravel!
        </p>

        <p class="col-md-8 mx-auto fs-5 mt-3 text-info">
            Esegui il login/register per poter visualizzare la dashboard!
        </p>
    </div>
</div>

@endsection