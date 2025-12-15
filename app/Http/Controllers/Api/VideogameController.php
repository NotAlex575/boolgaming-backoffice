<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    public function index(){
        $videogame = Videogame::with("franchise")->get();
        return response()->json([
            "success" => true,
            "result" => $videogame
        ]);
    }

    public function show(Videogame $videogame){
        $videogame->load("franchise", "consoles", "genres")->get();
        return response()->json([
            "success" => true,
            "result" => $videogame
        ]);
    }
}
