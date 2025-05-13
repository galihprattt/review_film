<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class PublicFilmController extends Controller
{
    public function index(Request $request)
    {
        $query = Film::query();

        
        if ($request->filled('genre')) {
            $query->where('genre', 'like', '%' . $request->genre . '%');
        }

        
        if ($request->filled('min_rating')) {
            $query->where('rating', '>=', $request->min_rating);
        }

        if ($request->filled('max_rating')) {
            $query->where('rating', '<=', $request->max_rating);
        }

        $films = $query->latest()->paginate(6)->withQueryString();

        return view('films.index', compact('films'));
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }
}
