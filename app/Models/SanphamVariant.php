<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SanphamVariant extends Model
{
    protected $table = 'sanpham_variants';
    protected $fillable = [
        'sanpham_id',
        'sku',
        'hinhanh',
        'giaban',
        'soluong',
        'trangthai'
    ];
    public function product()
    {
        // Liên kết ngược lại sản phẩm chính
        return $this->belongsTo(Sanpham::class, 'sanpham_id', 'id');
    }
    

    public function attributeValues() {
    // Kết nối từ variant qua bảng trung gian bienthe_variant_values
    // Để lấy được giá trị như "Trắng", "S", "M"...
    return $this->belongsToMany(BientheValue::class, 'variant_attribute_values', 'variant_id', 'bienthe_value_id');
    }
}
