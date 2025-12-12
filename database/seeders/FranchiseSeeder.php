<?php

namespace Database\Seeders;

use App\Models\Franchise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FranchiseSeeder extends Seeder
{
    public function run(): void
    {
        $franchises = [
            "The Legend of Zelda",
            "Final Fantasy",
            "Resident Evil",
            "God of War",
            "Call of Duty"
        ];

        foreach($franchises as $franchise){
            $newFranchise = new Franchise();
            $newFranchise ->nome = $franchise; 
            $newFranchise ->save(); 
        }
    }
}
