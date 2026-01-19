<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'province_code',
        'name',
        'short_name',
        'place_type',
        'country'
    ];
}
