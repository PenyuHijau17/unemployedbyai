<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'total',
        'status',

    ];

    protected $casts = [
        'tanggal' => 'date',
        'total' => 'decimal:2',
    ];


        'metode', // tambahkan ini biar field metode tersimpan
    ];

    // relasi ke user

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // relasi ke detail pesanan

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}

}