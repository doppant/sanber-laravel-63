<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiKey = env('API_KEY');
        $response = Http::get('https://api.themoviedb.org/3/movie/top_rated', [
            'api_key' => $apiKey,
            // 'limit' => 20,
        ]);
        $films = $response->json();
        // dd($films);
        
        // Fetch genres
        $genreResponse = Http::get('https://api.themoviedb.org/3/genre/movie/list', [
            'api_key' => $apiKey,
        ]);

        $genres = $genreResponse->json()['genres'];

        // Convert genres array to associative array with id as key
        $genreMap = [];
        foreach ($genres as $genre) {
            $genreMap[$genre['id']] = $genre['name'];
        }

        return view('partial.film.index', compact('films', 'genreMap'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
