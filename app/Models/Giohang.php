<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giohang extends Model
{
    use HasFactory;

    protected $table = 'giohang';
    public $incrementing = false;

    // Nếu không có id, cần khai báo: public $incrementing = false;
    
    protected $fillable = [
        'user_id',
        'sanpham_id',
        'soluong',
    ];

    public function sanpham()
    {
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}