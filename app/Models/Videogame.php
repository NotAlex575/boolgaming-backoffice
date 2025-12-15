<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    public function franchise(){
        return $this->belongsTo(Franchise::class);
    }

    public function consoles(){
        return $this->belongsToMany(Console::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
