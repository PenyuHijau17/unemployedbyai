<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [

        'category_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'harga',
        'stok',
        'gambar',
        'deskripsi'

    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}