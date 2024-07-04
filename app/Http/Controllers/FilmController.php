<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilmModel;

class FilmController extends Controller
{
    public function index()
    {
        try {
            $films = FilmModel::with('genre')->get();
            return response()->json(['films' => $films], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch films: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $film = FilmModel::find($id);

            if (!$film) {
                return response()->json(['message' => 'Film not found'], 404);
            }

            return response()->json(['film' => $film], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to find film: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'release_year' => 'required|integer',
                'duration' => 'required|integer',
                'director' => 'required|string',
                'genre_id' => 'required|integer',
            ]);

            $film = FilmModel::create($request->all());

            return response()->json(['film' => $film], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to store film: ' . $e->getMessage()], 500);
        }
    }

}