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
    protected $fillable = [
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public $relationable = [];
}
