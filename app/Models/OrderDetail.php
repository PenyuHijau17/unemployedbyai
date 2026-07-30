<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'book_id',
        'jumlah',
        'harga',
        'subtotal',
    ];


    protected $casts = [
        'harga' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];


    // relasi ke order

    public function order()
    {
        return $this->belongsTo(Order::class);
    }



    // relasi ke buku

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}


    // relasi ke user (lewat order)
    public function user()
    {
        return $this->hasOneThrough(User::class, Order::class, 'id', 'id', 'order_id', 'user_id');
    }
}