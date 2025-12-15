<?php

use App\Http\Controllers\Api\VideogameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::get("videogame", [VideogameController::class, "index"]);
Route::get("videogame/{videogame}", [VideogameController::class, "show"]);