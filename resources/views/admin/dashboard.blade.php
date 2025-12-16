@extends('layouts.app')

@section("title")
    Dashboard bellissime :) 
@endsection

@section('content')
<div class="container my-4">
    <!-- GIF Rickroll -->
    <div class="text-center mb-4">
        <img src="{{ asset('rick/rickroll.gif') }}" 
            alt="Rickroll" class="img-fluid rounded shadow" style="max-height: 200px;">
    </div>


    <h2 class="fs-3 text-primary text-center mb-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-primary">
                <div class="card-header bg-primary text-white fw-bold">
                    {{ __('User Dashboard') }}
                </div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="fs-5">{{ __('Sei loggato '. Auth::user()->name .'!') }}</p>
                    <p class="fs-5">Qui ci sono tutte le tabelle disponibili!</p>
                    <div class="d-flex row">
                        <a href="{{ route('admin.videogames.index') }}" class="btn btn-success btn-lg px-5">
                            Vai alla tabella dei Videogiochi
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary mt-3 w-20">
                            Torna alla Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
