<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    use HasFactory;

    protected $table = 'hoadon';

    protected $fillable = [
        'name', // Tên người nhận (thường lấy từ sdtnhan hoặc user)
        'ngaydat',
        'trangthai', // 0: Hủy, 1: Chờ xác nhận, 2: Đã xác nhận...
        'sdtnhan',
        'diachigiaohang',
        'user_id',
    ];

    // Định nghĩa hằng số trạng thái để code dễ đọc hơn (Optional)
    const STATUS_CANCELLED = 0;
    const STATUS_PENDING = 1;
    const STATUS_SHIPPING = 2;

    // 1. Quan hệ nghịch đảo: Hóa đơn thuộc về 1 User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // 2. Quan hệ 1-Nhiều: Một hóa đơn có nhiều chi tiết
    public function chiTiet()
    {
        return $this->hasMany(CtHoadon::class, 'hoadon_id', 'id');
    }
}