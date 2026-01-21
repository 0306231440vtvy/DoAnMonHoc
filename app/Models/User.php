<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
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
        'email_verified_at'
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
    public function yeuthich()
    {
        // Quan hệ Nhiều - Nhiều với bảng Sanpham thông qua bảng trung gian 'yeuthich'
        return $this->belongsToMany(Sanpham::class, 'yeuthich', 'user_id', 'sanpham_id')
                    ->withTimestamps();
    }
}