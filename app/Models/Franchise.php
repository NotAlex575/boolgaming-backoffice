<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    public function videogame(){
        return $this->HasMany(Videogame::class);
    }
}
