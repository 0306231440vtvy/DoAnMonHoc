<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BienThe extends Model
{
    protected $table = 'bienthe';
    protected $fillable = [
        'name',
        'type',
        'trangthai'
    ];
    public function bienthe_values(): HasMany
    {
        return $this->hasMany(BientheValue::class, 'bienthe_id');
    }
    public $relationable = [];
}
