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
    public $relationable = [];
}
