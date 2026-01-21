<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    protected $fillable = [
        'tensp',
        'hinhanh',
        'soluong',
        'giaban',
        'slug',
        'mota',
        'bienthe_id',
        'category_id',
        'thuonghieu_id',
    ];

    // Nếu bạn muốn truy ngược lại xem sản phẩm này nằm trong đơn hàng nào (ít dùng nhưng có thể cần thống kê)
    public function chiTietHoadon()
    {
        return $this->hasMany(CtHoadon::class, 'sanpham_id', 'id');
    }
    
    public function usersYeuthich()
    {
        return $this->belongsToMany(User::class, 'yeuthich', 'sanpham_id', 'user_id');
    }
}