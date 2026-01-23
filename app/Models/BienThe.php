<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BienThe extends Model
{
    protected $table = 'bienthe';
    protected $fillable = [
        'name',
        'type',
        'value',
        'trangthai'
    ];

    public function values()
    {
        // Một loại (Màu sắc) có NHIỀU giá trị (Trắng, Đen...)
        return $this->hasMany(BientheValue::class, 'bienthe_id', 'id');
    }
}
