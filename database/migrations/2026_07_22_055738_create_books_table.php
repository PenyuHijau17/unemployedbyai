<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // Relasi ke kategori (sementara belum pakai foreign key)
            $table->unsignedBigInteger('category_id')->nullable();

            // Informasi Buku
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');

            // Harga & Stok
            $table->decimal('harga', 10, 2);
            $table->integer('stok');

            // Cover Buku
            $table->string('gambar')->nullable();

            // Deskripsi
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};