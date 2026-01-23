<?php

namespace App\Models;

use App\Trait\HasQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sanpham extends Model
{
    use HasFactory, HasQuery;

    protected $table = 'sanpham';

    protected $fillable = [
        'tensp',
        'album',
        'hinhnen',
        'soluong',
        'giaban',
        'discount',
        'sku',
        'slug',
        'mota',
        'category_id',
        'thuonghieu_id',
    ];

    // Nếu bạn muốn truy ngược lại xem sản phẩm này nằm trong đơn hàng nào (ít dùng nhưng có thể cần thống kê)
    

    // Check xem user hiện tại đã thích sản phẩm này chưa (Helper function)
    public function isFavoritedBy($userId)
    {
        return $this->belongsToMany(User::class, 'yeuthich', 'sanpham_id', 'user_id')
            ->where('user_id', $userId)
            ->exists();
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_sanpham', 'sanpham_id', 'category_id')->withTimestamps();
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
    public function variants(): HasMany
    {
        // Kiểm tra xem SanphamVariant::class có tồn tại không
        return $this->hasMany(SanphamVariant::class, 'sanpham_id', 'id');
    }    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    protected $casts = [
        'album' => 'array'
    ];
    protected $relationable = ['sanpham_variants'];

    // Trong file App\Models\Sanpham.php
    // app/Models/Sanpham.php

        public function binhluans() 
        {
           
            return $this->hasMany(Binhluan::class, 'sanpham_id', 'id');
        }
}
