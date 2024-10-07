<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Product $product)
    {
        // Calcola la media delle valutazioni e il numero totale di valutazioni per il prodotto specifico
        $averageRating = $product->ratings()->avg('rating');
        $totalRatings = $product->ratings()->count();

        // Restituisci la risposta JSON con la media e il conteggio totale
        return response()->json([
            'average_rating' => round($averageRating, 2), // Arrotonda la media a 2 decimali
            'total_ratings' => $totalRatings,
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = new Rating();
        $rating->product_id = $product->id;
        $rating->rating = $request->rating;
        $rating->save();

        return response()->json(['message' => 'Rating added successfully'], 201);
    }
}
