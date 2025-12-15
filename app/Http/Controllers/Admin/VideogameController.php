<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Console;
use App\models\Franchise;
use App\Models\Franchise as ModelsFranchise;
use App\models\Genre;
use App\models\Videogame;

use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();
        return view("admin.videogames.index", compact("videogames"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $franchises = Franchise::all();

        $consoles = Console::all();

        $genres = Genre::all();

        return view("admin.videogames.create", compact("franchises","consoles", "genres"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newVideogame = new Videogame();
        $newVideogame->nome = $data['nome'];
        $newVideogame->franchise_id = $data['franchise_id'];
        $newVideogame->pegi = $data['pegi'];
        $newVideogame->release_date = $data['release_date'];
        $newVideogame->immagine = $data['immagine'];
        $newVideogame->prezzo = $data['prezzo'];
        $newVideogame->descrizione = $data['descrizione'];
        $newVideogame->trailer = $data['trailer'];
        $newVideogame->save();

        // Dopo aver salvato il post, controllo se ho ricevuto le console e i genre
        if ($request->has('consoles')) {
            $newVideogame->consoles()->attach($data['consoles']);
        }
        if ($request->has('genres')) {
            $newVideogame->genres()->attach($data['genres']);
        }

        if ($request->action === "save_add"){
            return redirect()->route("admin.videogame.create");
        }
        return redirect()->route("admin.videogames.show", $newVideogame->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view("admin.videogames.show", compact("videogame"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        $franchises = Franchise::all();

        $consoles = Console::all();

        $genres = Genre::all();

        return view("admin.videogames.edit", compact("videogame", "franchises","consoles","genres"));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        $videogame->nome = $data['nome'];
        $videogame->franchise_id = $data['franchise_id'];
        $videogame->pegi = $data['pegi'];
        $videogame->release_date = $data['release_date'];
        $videogame->immagine = $data['immagine'];
        $videogame->prezzo = $data['prezzo'];
        $videogame->descrizione = $data['descrizione'];
        $videogame->trailer = $data['trailer'];
        $videogame->update();

        // Dopo aver salvato il videogioco, controllo se ho ricevuto dei tag consoles
        if ($request->has('consoles')) {
            $videogame->consoles()->sync($data['consoles']);
        } else {
            $videogame->consoles()->detach();
        }

        // Dopo aver salvato il videogioco, controllo se ho ricevuto dei tag genres
        if ($request->has('genres')) {
            $videogame->genres()->sync($data['genres']);
        } else {
            $videogame->genres()->detach();
        }
        return redirect()->route("admin.videogames.show", $videogame);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        // Rimuove tutte le relazioni nella pivot
        $videogame->consoles()->detach();
        $videogame->genres()->detach();

        // Poi cancella il progetto
        $videogame->delete();

        return redirect()->route("admin.videogames.index");
    }
}
