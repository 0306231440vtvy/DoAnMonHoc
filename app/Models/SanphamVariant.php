<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SanphamVariant extends Model
{
    protected $table = ['sanpham_variants'];
    protected $fillable = [
        'sanpham_id',
        'sku',
        'hinhanh',
        'giaban',
        'soluong',
        'trangthai'
    ];
    public function attributesValues(): BelongsToMany
    {
        return $this->belongsToMany(
            BientheValue::class,
            'variant_attribute_values',
            'variant_id',
            'bienthe_value_id'
        )->withTimestamps();
    }
    public function  sanpham(): BelongsTo
    {
        return $this->belongsTo(Sanpham::class);
    }
}
