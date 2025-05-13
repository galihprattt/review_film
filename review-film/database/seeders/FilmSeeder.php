<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run()
    {
        Film::truncate(); 

        Film::create([
            'judul' => 'Attack on Titan Final Season',
            'sinopsis' => 'Pertempuran akhir antara manusia dan titan.',
            'tahun' => 2023,
            'genre' => 'Action, Fantasy',
        ]);

        Film::create([
            'judul' => 'Jujutsu Kaisen 0',
            'sinopsis' => 'Yuta Okkotsu menghadapi kutukan mematikan.',
            'tahun' => 2021,
            'genre' => 'Action, Supernatural',
        ]);

        Film::create([
            'judul' => 'Your Name',
            'sinopsis' => 'Pertukaran tubuh misterius antara dua remaja.',
            'tahun' => 2016,
            'genre' => 'Romance, Drama, Fantasy',
        ]);
    }
}
