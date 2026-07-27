<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Novel',
            'deskripsi' => 'Kumpulan buku novel dari berbagai genre.',
        ]);

        Category::create([
            'nama_kategori' => 'Komik',
            'deskripsi' => 'Buku komik lokal maupun internasional.',
        ]);

        Category::create([
            'nama_kategori' => 'Manga',
            'deskripsi' => 'Komik Jepang dari berbagai genre.',
        ]);

        Category::create([
            'nama_kategori' => 'Wattpad',
            'deskripsi' => 'Novel yang berasal dari platform Wattpad.',
        ]);

        Category::create([
            'nama_kategori' => 'Pendidikan',
            'deskripsi' => 'Buku pelajaran, referensi, dan akademik.',
        ]);

        Category::create([
            'nama_kategori' => 'Teknologi',
            'deskripsi' => 'Buku komputer, pemrograman, dan teknologi.',
        ]);
    }
}