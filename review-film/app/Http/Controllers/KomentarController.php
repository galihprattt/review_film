<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use App\Models\Film;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, Film $film)
    {
        $request->validate([
            'isi' => 'required'
        ]);

        $film->komentars()->create([
            'user_id' => auth()->id(),
            'isi' => $request->isi
        ]);

        return back();
    }
}
