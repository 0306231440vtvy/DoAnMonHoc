<?php

namespace App\Models;

use App\Trait\HasQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sanpham extends Model
{
    use HasFactory, HasQuery;

    protected $table = 'sanpham';

    protected $fillable = [
        'tensp',
        'hinhanh',
        'soluong',
        'giaban',
        'sku',
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

    // Check xem user hiện tại đã thích sản phẩm này chưa (Helper function)
    public function isFavoritedBy($userId)
    {
        return $this->belongsToMany(User::class, 'yeuthich', 'sanpham_id', 'user_id')
            ->where('user_id', $userId)
            ->exists();
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function bienthe(): BelongsToMany
    {
        return $this->belongsToMany(BienThe::class, 'bienthe_sanpham', 'sanpham_id', 'bienthe_id')->withTimestamps();
    }
    public function thuonghieu(): BelongsTo
    {
        return $this->belongsTo(ThuongHieu::class);
    }
    // Format giá bán
    // public function getFormatPrice()
    // {
    //     return number_format($this->giaban, 0, ',', '.') . ' d';
    // }
}
