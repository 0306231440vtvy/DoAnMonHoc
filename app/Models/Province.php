<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = [
        'province_code',
        'name',
        'short_name',
        'place_type',
        'country'
    ];
    public function ward(): HasMany
    {
        return $this->hasMany(Ward::class);
    }
}
