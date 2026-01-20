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
    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(SanphamVariant::class, 'variant_attribute_values', 'bienthe_value_id', 'variant_id');
    }
}
