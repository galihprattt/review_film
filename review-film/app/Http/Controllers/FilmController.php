<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    
    public function index()
    {
        $films = Film::latest()->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    
    public function adminIndex(Request $request)
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

        return view('admin.films.index', compact('films'));
    }

    
    public function create()
    {
        return view('admin.films.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'ulasan' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $posterPath = null;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        } else {
            $posterPath = 'posters/default.jpg'; 
        }

        $data = $request->only('judul', 'genre', 'ulasan', 'rating');
        $data['poster'] = $posterPath;

        Film::create($data);

        return redirect('/admin/films')->with('success', 'Film berhasil ditambahkan!');
    }

    
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.show', compact('film'));
    }

    
    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }

   
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'ulasan' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('judul', 'genre', 'ulasan', 'rating');

        $posterPath = $film->poster;
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters', 'public');
        }

        $data['poster'] = $posterPath;

        $film->update($data);

        return redirect('/admin/films')->with('success', 'Film berhasil diperbarui!');
    }

    
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('/admin/films')->with('success', 'Film berhasil dihapus!');
    }
}
