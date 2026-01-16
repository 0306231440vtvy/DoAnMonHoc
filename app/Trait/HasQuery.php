<?php

namespace App\Trait;

use Illuminate\Support\Facades\DB;

trait HasQuery
{
    public function scopeWithRelations($query, array $with = [])
    {
        return $query->with($with)->withCount($with);
    }
    public function scropeKeyword($query, $keyword, array $columns = [])
    {
        return $query->where(function ($q) use ($keyword, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', "%{$keyword}%");
            }
        });
    }
}
