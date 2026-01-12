<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Những cột được phép thêm/sửa vào database
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',    // Cột bạn thêm
        'publish',  // Cột bạn thêm (1: Active, 0: Block)
        'address',  // Nếu có
        'avatar',   // Nếu có
    ];

    /**
     * Những cột bị ẩn khi trả về API/Json
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Định dạng dữ liệu
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}