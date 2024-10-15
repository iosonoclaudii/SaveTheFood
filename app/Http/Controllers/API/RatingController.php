<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        // Validazione del campo rating
        $request->validate([
            'rating' => 'required|integer|min:1|max:5', // Accetta solo valori da 1 a 5
        ]);

        // Creazione del rating
        $rating = Rating::create([
            'rating' => $request->input('rating'),
        ]);

        // Restituzione della risposta di successo
        return response()->json(['message' => 'Voto aggiunto con successo!', 'data' => $rating], 201);
    }

    // Metodo per ottenere il numero totale di voti
    public function total()
    {
        // Conta il numero totale dei voti nella tabella ratings
        $totalRatings = Rating::count();
        
        // Restituisce il conteggio totale come risposta JSON
        return response()->json(['total_ratings' => $totalRatings]);
    }
}
