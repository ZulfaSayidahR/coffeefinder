<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoffeeShop extends Model
{
    protected $table = 'coffee_shops';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'harga_min',
        'harga_max',
        'kategori',
        'suasana',
        'foto',
        'menu_link',
        'latitude',
        'longitude',
        'sosmed_instagram'
    ];

    // 🔗 Relasi ke Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // 🔗 Relasi ke Favorite
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

}