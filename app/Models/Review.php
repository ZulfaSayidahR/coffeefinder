<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'coffee_shop_id',
        'rating',
        'komentar'
    ];

    // 🔗 Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relasi ke CoffeeShop
    public function coffeeShop()
    {
        return $this->belongsTo(CoffeeShop::class);
    }
}