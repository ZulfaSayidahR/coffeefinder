<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Mass assignable
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Hidden fields
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * AUTO HASH PASSWORD
     */
    protected static function boot()
    {
        parent::boot();

        // Saat create user
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });

        // Saat update user
        static::updating(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    /**
     * RELASI REVIEW
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}