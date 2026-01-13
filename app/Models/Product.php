<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'sanpham';
    protected $fillable = [
        'id',
        'tensp',
        'giaban',
        'soluong',
        'slug',
        'mota',
        'bienthe_id'
    ];
}
