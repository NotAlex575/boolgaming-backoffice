<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Faker\Generator as Faker;

class GenreSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $genres = 
        [
            "Action-Adventure",
            "RPG",
            "Horror",
            "Shooter",
            "Platformer"
        ];

        foreach($genres as $genre)
            { 
                $newGenre = new Genre();
                $newGenre->nome = $genre; 
                $newGenre->color = $faker->hexColor(); 
                $newGenre->save(); 
            } 

    }
}
