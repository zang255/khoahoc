<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Mở rộng từ Authenticatable
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Thêm Notifiable trait nếu bạn muốn sử dụng thông báo

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'=>'hashed',
    ];

    // Optional: Set default role if not provided
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (is_null($user->role)) {
                $user->role = 'user'; // Gán giá trị mặc định cho role
            }
        });
    }
}

