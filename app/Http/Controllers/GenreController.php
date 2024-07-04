<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreModel;

class GenreController extends Controller
{
    public function index()
    {
        try {
            $genres = GenreModel::all();
            return response()->json(['genres' => $genres], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to fetch genres: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $genre = GenreModel::find($id);

            if (!$genre) {
                return response()->json(['message' => 'Genre not found'], 404);
            }

            return response()->json(['genre' => $genre], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to find genre: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
            ]);

            $genre = GenreModel::create($request->all());

            return response()->json(['genre' => $genre], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to store genre: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $genre = GenreModel::find($id);

            if (!$genre) {
                return response()->json(['message' => 'Genre not found'], 404);
            }

            $request->validate([
                'name' => 'string',
            ]);

            $genre->update($request->all());

            return response()->json(['genre' => $genre], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update genre: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $genre = GenreModel::find($id);

            if (!$genre) {
                return response()->json(['message' => 'Genre not found'], 404);
            }

            $genre->delete();

            return response()->json(['message' => 'Genre deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete genre: ' . $e->getMessage()], 500);
        }
    }
}
