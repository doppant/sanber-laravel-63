<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all(); // Retrieve all films
        return view('partial.film.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('partial.film.create', compact('genres'));
    }

    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you're handling file uploads
            'genres' => 'required|array|min:1', // Ensure at least one genre is selected
            'genres.*' => 'exists:genres,id', // Ensure all selected genres exist in the genres table
        ]);

        // Handle file upload (if needed)
        $posterPath = $request->file('poster')->store('posters', 'public');

        // Create the film and save it
        $film = Film::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'release_year' => $request->release_year,
            'poster' => $posterPath, // Store the file path
        ]);

        // Attach selected genres to the film in the pivot table
        $film->genres()->attach($request->genres); // Attach the selected genres

        return redirect()->route('films.index')->with('success', 'Film created successfully!'); // Redirect back to the films index
    }


    public function show($id)
    {
        $film = Film::findOrFail($id); // Retrieve the film by ID
        return view('partial.film.show', compact('film'));
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all(); // Get all genres for the dropdown
        return view('partial.film.edit', compact('film', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'release_year' => 'required|string|max:4',
            'genres' => 'required|array',  // Make sure genres are selected
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $film = Film::findOrFail($id);

        // Update film attributes
        $film->title = $request->input('title');
        $film->summary = $request->input('summary');
        $film->release_year = $request->input('release_year');

        // Update genres
        $film->genres()->sync($request->input('genres'));

        // Handle poster upload if present
        if ($request->hasFile('poster')) {
            // Delete old poster
            if ($film->poster && Storage::disk('public')->exists($film->poster)) {
                Storage::disk('public')->delete($film->poster);
            }

            // Store new poster
            $posterPath = $request->file('poster')->store('posters', 'public');
            $film->poster = $posterPath;
        }

        $film->save();

        return redirect()->route('films.index')->with('success', 'Film updated successfully!');
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->genres()->detach(); // Detach genres before deleting the film
        $film->delete();

        // Redirect to the film index with a success message
        return redirect()->route('films.index')->with('success', 'Film deleted successfully!');
    }
}
