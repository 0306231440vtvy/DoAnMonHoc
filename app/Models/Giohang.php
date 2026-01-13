<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    
    // Bảng này trong thiết kế của bạn có thể không có cột 'id' tự tăng (primary key)?
    // Nếu không có id, cần khai báo: public $incrementing = false;
    
    protected $fillable = [
        'user_id',
        'sanpham_id',
    ];

    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
}