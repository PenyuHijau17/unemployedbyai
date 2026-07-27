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


    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relasi ke detail pesanan
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }


    // Alias jika controller lama memakai details()
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}