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
    public function sanpham(): BelongsToMany
    {
        return $this->belongsToMany(Sanpham::class, 'bienthe_sanpham', 'bienthe_id', 'sanpham_id');
    }
}
