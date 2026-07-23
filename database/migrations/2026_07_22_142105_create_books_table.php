<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('judul');

            $table->string('penulis');

            $table->string('penerbit');

            $table->year('tahun_terbit');

            $table->integer('harga');

            $table->integer('stok');

            $table->string('gambar')->nullable();

            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};