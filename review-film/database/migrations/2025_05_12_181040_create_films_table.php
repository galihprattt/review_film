<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('films', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('genre');
        $table->text('ulasan');
        $table->float('rating', 3, 1); // contoh: 8.5
        $table->string('poster')->nullable(); // untuk nama file gambar
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
