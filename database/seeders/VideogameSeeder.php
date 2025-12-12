<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VideogameSeeder extends Seeder
{
    public function run(): void
    {
        $videogames = [
            [
                "nome" => "The Legend of Zelda: Breath of the Wild",
                "pegi" => 12,
                "release_date" => "2017-03-03",
                "immagine" => "breath_of_the_wild.jpg",
                "prezzo" => 59.99,
                "descrizione" => "Open-world adventure in Hyrule.",
                "genre_id" => 1,
                "franchise_id" => 1
            ],

            [
                "nome" => "Final Fantasy VII Remake",
                "pegi" => 16,
                "release_date" => "2020-04-10",
                "immagine" => "ff7_remake.jpg",
                "prezzo" => 69.99,
                "descrizione" => "Reimagining of the classic JRPG.",
                "genre_id" => 2,
                "franchise_id" => 2
            ],

            [
                "nome" => "Resident Evil Village",
                "pegi" => 18,
                "release_date" => "2021-05-07",
                "immagine" => "re_village.jpg",
                "prezzo" => 59.99,
                "descrizione" => "Survival horror in a mysterious village.",
                "genre_id" => 3,
                "franchise_id" => 3
            ],

            [
                "nome" => "God of War Ragnarök",
                "pegi" => 18,
                "release_date" => "2022-11-09",
                "immagine" => "gow_ragnarok.jpg",
                "prezzo" => 69.99,
                "descrizione" => "Kratos and Atreus face Norse gods.",
                "genre_id" => 1,
                "franchise_id" => 4
            ],

            [
                "nome" => "Call of Duty: Modern Warfare II",
                "pegi" => 18,
                "release_date" => "2022-10-28",
                "immagine" => "cod_mw2.jpg",
                "prezzo" => 69.99,
                "descrizione" => "High-intensity military shooter.",
                "genre_id" => 4,
                "franchise_id" => 5
            ]
        ];

        foreach($videogames as $videogame){
            $newvideogame = new Videogame();
            $newvideogame ->nome = $videogame['nome'];
            $newvideogame ->pegi = $videogame['pegi'];
            $newvideogame ->release_date = $videogame['release_date'];
            $newvideogame ->immagine = $videogame['immagine'];
            $newvideogame ->prezzo = $videogame['prezzo'];
            $newvideogame ->descrizione = $videogame['descrizione'];
            $newvideogame ->genre_id = rand(1,5);
            $newvideogame ->console_id = rand(1,5);
            $newvideogame ->save();
        }
    }
}
