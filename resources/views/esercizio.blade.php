@extends('layouts.app')

@section("title")
    TEST BELLO
@endsection


@section('content')

    @php
    $passengers = [
        [
            "id" => 1,
            "passengerName" => "Freddie Mercury",
            "isVegetarianOrVegan" => false,
            "connectedFlights" => 2,
        ],
        [
            "id" => 2,
            "passengerName" => "Amy Winehouse",
            "isVegetarianOrVegan" => true,
            "connectedFlights" => 4,
        ],
            [
            "id" => 3,
            "passengerName" => "Kurt Cobain",
            "isVegetarianOrVegan" => true,
            "connectedFlights" => 3,
        ],
        [
            "id" => 3,
            "passengerName" => "Michael Jackson",
            "isVegetarianOrVegan" => true,
            "connectedFlights" => 1,
        ],
    ];

    $passengersName = [];

    foreach($passengers as $passenger)
    {
        if($passenger["isVegetarianOrVegan"]){
            $passengersName[] = $passenger["passengerName"];
        }
    }

    dd($passengersName);

    @endphp

    <h1>SONO DENTRO ALLA PAGINA ESERCIZIO</h1>

@endsection