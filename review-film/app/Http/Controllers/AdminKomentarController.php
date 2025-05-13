<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class AdminKomentarController extends Controller
{
    public function index()
    {
        $komentars = Komentar::with('user', 'film')->latest()->get();
        return view('admin.komentar.index', compact('komentars'));
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);
        $komentar->delete();

        return redirect()->route('admin.komentar.index')->with('success', 'Komentar berhasil dihapus.');
    }
}
