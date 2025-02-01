<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    // Display a listing of the cast.
    public function index()
    {
        $casts = Cast::all(); // Retrieve all cast members
        return view('partial.cast.index', compact('casts')); // Pass data to the view
    }

    // Show the form for creating a new cast.
    public function create()
    {
        return view('partial.cast.create');
    }

    // Store a newly created cast in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'bio' => 'nullable|string',
        ]);

        Cast::create($request->all());

        return redirect()->route('cast.index')->with('success', 'Cast created successfully');
    }

    // Display the specified cast.
    public function show($id)
    {
        $cast = Cast::findOrFail($id);
        return view('partial.cast.show', compact('cast'));
    }

    // Show the form for editing the specified cast.
    public function edit($id)
    {
        $cast = Cast::findOrFail($id);
        return view('partial.cast.edit', compact('cast'));
    }

    // Update the specified cast in the database.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'bio' => 'nullable|string',
        ]);

        $cast = Cast::findOrFail($id);
        $cast->update($request->all());

        return redirect()->route('cast.index')->with('success', 'Cast updated successfully');
    }

    // Remove the specified cast from the database.
    public function destroy($id)
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();

        return redirect()->route('cast.index')->with('success', 'Cast deleted successfully');
    }
}

