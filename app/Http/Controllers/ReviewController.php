<?php

namespace App\Http\Controllers;

use App\Models\FilmReview;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a new review for a specific film.
     */
    public function store(Request $request, $filmId)
    {
        // Validate the input
        $request->validate([
            'content' => 'required|string|max:500',
            'point' => 'required|integer|min:1|max:5',
        ]);

        $film = Film::findOrFail($filmId);

        // Create a new review
        FilmReview::create([
            'film_id' => $film->id,
            'user_id' => Auth::id(), // Authenticated user ID
            'content' => $request->content,
            'point' => $request->point,
        ]);

        return redirect()->route('films.show', $filmId)->with('success', 'Review added successfully!');
    }
}
