<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binhluan';

    protected $fillable = [
        'user_id',
        'sanpham_id',
        'noidung',
        'sosao',
        'trangthai'
    ];

    // Mối quan hệ: Một bình luận thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Mối quan hệ: Một bình luận thuộc về một sản phẩm
    public function product()
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id');
    }
}