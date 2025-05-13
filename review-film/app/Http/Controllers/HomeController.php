<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class HomeController extends Controller
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

        return view('beranda', compact('films'));
    }
}
