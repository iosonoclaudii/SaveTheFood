<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;

// Definizione delle rotte per il controller RatingController
Route::get('products/{product}/ratings', [RatingController::class, 'index']);
Route::post('products/{product}/ratings', [RatingController::class, 'store']);

// Esempio di rotta per ottenere l'utente autenticato (puoi rimuoverla se non necessaria)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
