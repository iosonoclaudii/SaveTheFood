<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RatingController;

// Definizione delle rotte per i rating
Route::post('/ratings', [RatingController::class, 'store']);

Route::get('/ratings/total', [RatingController::class, 'total']);