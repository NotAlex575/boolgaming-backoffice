<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ConsoleSeeder extends Seeder
{
   public function run(Faker $faker): void
    {
        $consoles = [
            "PlayStation 5",
            "Xbox Series X",
            "Nintendo Switch",
            "PC",
            "PlayStation 4"
        ];

        foreach($consoles as $console)
            { 
                $newConsole = new Console();
                $newConsole->nome = $console; 
                $newConsole->color = $faker->hexColor(); 
                $newConsole->save(); 
            } 

    }
}
