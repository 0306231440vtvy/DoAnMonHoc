<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BientheValue extends Model
{
    protected $table = 'bienthe_values';
    protected $fillable = [
        'bienthe_id',
        'value',
        'code'
    ];
    public function bienthe(): BelongsTo
    {
        return $this->BelongsTo(BienThe::class);
    }
    public function attributeType(): BelongsTo
    {
        // 'bienthe_id' là cột khóa ngoại trong bảng bienthe_values
        return $this->belongsTo(BienThe::class, 'bienthe_id', 'id');
    }
}
