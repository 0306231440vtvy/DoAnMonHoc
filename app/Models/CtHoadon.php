<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtHoadon extends Model
{
    use HasFactory;

    protected $table = 'ct_hoadon';

    protected $fillable = [
        'thanhtien',
        'soluong',
        'trangthai',
        'dongia',
        'hoadon_id',
        'sanpham_id',
    ];

    // 1. Thuộc về Hóa đơn
    public function hoadon()
    {
        return $this->belongsTo(Hoadon::class, 'hoadon_id', 'id');
    }

    // 2. Thuộc về Sản phẩm (để lấy tên, ảnh sp hiển thị trong lịch sử đơn hàng)
    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
    public $relationable = [];
}
