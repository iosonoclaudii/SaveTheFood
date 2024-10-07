<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Esempio di rotta per ottenere l'utente autenticato (puoi rimuoverla se non necessaria)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
