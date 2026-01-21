<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    protected $fillable = [
        'ward_code',
        'name',
        'province_code' // Cột này dùng để nối với bảng provinces
    ];

    // Mối quan hệ: Xã thuộc về Tỉnh
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'province_code');
    }
}