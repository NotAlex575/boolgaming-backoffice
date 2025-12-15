@extends('layouts.app')

@section('content')

<div class="content py-5 bg-secondary bg-opacity-25">
    <div class="container">
        <div class="p-5 bg-dark text-light rounded-4 shadow-lg">

            <!-- Titolo -->
            <h2 class="text-info fw-bold mb-4 text-center">Chi Sono</h2>
            <p class="lead text-center">Ciao! Sono <strong>Alessandro Agnello</strong>, programmatore appassionato di videogiochi e sviluppo software.</p>

            <hr class="border-warning my-4">

            <!-- Game Development -->
            <h3 class="text-warning fw-semibold mb-3">Percorso nel Game Development</h3>
            <p>Ho iniziato come <span class="badge bg-info text-dark rounded-pill px-2 py-1">Game Developer</span> usando <span class="badge bg-primary rounded-pill px-2 py-1">Unity</span> e il linguaggio <span class="badge bg-success rounded-pill px-2 py-1">C#</span> per creare i miei primi progetti.</p>
            <p>Ho approfondito le mie competenze con <span class="badge bg-danger rounded-pill px-2 py-1">Unreal Engine 4.26</span> durante il percorso alla scuola di Vigamus e partecipando a diversi eventi e game jam.</p>

            <h3 class="text-warning fw-semibold mt-4 mb-3">Esperienze Salienti</h3>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item bg-dark text-light mb-2 border-info rounded shadow-sm">
                    <strong>PROJECTINFINITO3</strong> - 
                    <a href="https://www.vigamusacademy.com/infinito-3-dante-naraku/" target="_blank" class="text-info text-decoration-none">Vigamus.com</a>,
                    <a href="https://vantan-game.com/special/tgs/tgs2021/sub_page_06.html" target="_blank" class="text-info text-decoration-none">Vantan.com</a>
                    <p class="mb-0 small">Team di studenti guidati da Suda51 per programmare un gioco ispirato a Dante Alighieri.</p>
                </li>
                <li class="list-group-item bg-dark text-light mb-2 border-info rounded shadow-sm">
                    <strong>Gamejam 2021</strong> - 
                    <a href="https://1nvadersmustdie.itch.io/insert-title-here" target="_blank" class="text-info text-decoration-none">1nvadersmustdie.itch.io</a>
                    <p class="mb-0 small">Esperienza immersiva di 2 giorni dedicata al game design e alla programmazione del gioco.</p>
                </li>
            </ul>

            <h3 class="text-warning fw-semibold mt-4 mb-3">Percorso nel Full Stack Development</h3>
            <p>Ho ampliato le mie conoscenze nel <span class="badge bg-primary rounded-pill px-2 py-1">Full Stack Development</span>, studiando diversi framework e linguaggi per creare siti web responsive e accessibili.</p>

            <hr class="border-warning my-4">

            <h3 class="text-warning fw-semibold mb-3">Competenze Web</h3>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">HTML</span>
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">CSS</span>
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">Tailwind</span>
                <span class="badge bg-info text-dark rounded-pill px-3 py-2">Bootstrap</span>
            </div>

            <h3 class="text-warning fw-semibold mb-3">Linguaggi Studiati</h3>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-success rounded-pill px-3 py-2">PHP</span>
                <span class="badge bg-success rounded-pill px-3 py-2">JavaScript</span>
                <span class="badge bg-success rounded-pill px-3 py-2">Java</span>
            </div>

            <h3 class="text-warning fw-semibold mb-3">Framework Studiati</h3>
            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-danger rounded-pill px-3 py-2">Laravel</span>
                <span class="badge bg-danger rounded-pill px-3 py-2">React</span>
                <span class="badge bg-danger rounded-pill px-3 py-2">Spring</span>
            </div>

            <p class="mt-4">Ho ancora molto da imparare, ma do sempre il massimo per raggiungere ogni obiettivo!</p>
            <strong class="fw-bold text-center fs-5">Keep calm, and let's code!</strong>
        </div>
    </div>
</div>

@endsection