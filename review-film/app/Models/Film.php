<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = ['judul', 'genre', 'ulasan', 'rating', 'poster'];

    // Relasi satu film memiliki banyak komentar
    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
