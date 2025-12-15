<!-- resources/views/errors/404.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1>File o pagina non trovata...</h1>
    <div class="text-center mb-4">
        <img src="{{ asset('wasted/wasted-putther.gif') }}" alt="wasted" class="img-fluid rounded shadow" style="max-height: 200px;">
    </div>
</div>
@endsection