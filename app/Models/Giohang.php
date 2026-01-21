<?php

namespace App\Models;

use App\Trait\HasQuery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Giohang extends Model
{
    use HasFactory, HasQuery;

    protected $table = 'giohang';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'sanpham_id',
        'soluong',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sanpham(): Belongsto{
        return $this->belongsto(SanPham::class,'sanpham_id','id');
    }
    public $relationable = [];
}
