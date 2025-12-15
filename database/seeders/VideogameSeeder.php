<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    public function run(): void
    {
        $videogames = [
            [
                "nome" => "The Legend of Zelda: Echoes of Hyrule",
                "pegi" => 12,
                "release_date" => "2025-03-15",
                "immagine" => "zelda_echoes_of_hyrule.jpg",
                "prezzo" => 74.99,
                "descrizione" => "Avventura open-world che continua le storie dei cieli di Hyrule.",
                "trailer" => "https://www.youtube.com/watch?v=zelda_echoes_trailer",
                "genre_id" => 1,
                "franchise_id" => 1
            ],
            [
                "nome" => "Final Fantasy XVI: Shadows of Valisthea",
                "pegi" => 16,
                "release_date" => "2025-05-20",
                "immagine" => "ff16_shadows_valisthea.jpg",
                "prezzo" => 79.99,
                "descrizione" => "Espansione dell'ultimo capitolo, nuove storie e dungeon.",
                "trailer" => "https://www.youtube.com/watch?v=ff16_shadows_trailer",
                "genre_id" => 2,
                "franchise_id" => 2
            ],
            [
                "nome" => "Resident Evil: Umbrella Chronicles",
                "pegi" => 18,
                "release_date" => "2025-07-10",
                "immagine" => "re_umbrella_chronicles.jpg",
                "prezzo" => 69.99,
                "descrizione" => "Nuovo survival horror con collegamenti diretti ai precedenti episodi.",
                "trailer" => "https://www.youtube.com/watch?v=re_umbrella_trailer",
                "genre_id" => 3,
                "franchise_id" => 3
            ],
            [
                "nome" => "God of War: Rise of Valkyries",
                "pegi" => 18,
                "release_date" => "2025-09-05",
                "immagine" => "gow_rise_of_valkyries.jpg",
                "prezzo" => 84.99,
                "descrizione" => "Kratos e Atreus affrontano una nuova minaccia tra i Nove Mondi.",
                "trailer" => "https://www.youtube.com/watch?v=gow_valkyries_trailer",
                "genre_id" => 1,
                "franchise_id" => 4
            ],
            [
                "nome" => "Call of Duty: Global Conflict",
                "pegi" => 18,
                "release_date" => "2025-12-12",
                "immagine" => "cod_global_conflict.jpg",
                "prezzo" => 79.99,
                "descrizione" => "Nuovo capitolo militare con campagne e multiplayer interconnessi agli episodi precedenti.",
                "trailer" => "https://www.youtube.com/watch?v=cod_global_trailer",
                "genre_id" => 4,
                "franchise_id" => 5
            ],
        ];

        foreach($videogames as $videogame){
            $newVideogame = new Videogame();
            $newVideogame->nome = $videogame['nome'];
            $newVideogame->pegi = $videogame['pegi'];
            $newVideogame->release_date = $videogame['release_date'];
            $newVideogame->immagine = $videogame['immagine'];
            $newVideogame->prezzo = $videogame['prezzo'];
            $newVideogame->descrizione = $videogame['descrizione'];
            $newVideogame->trailer = $videogame['trailer'];
            $newVideogame->franchise_id = $videogame['franchise_id'];
            $newVideogame->save();
        }
    }
}
