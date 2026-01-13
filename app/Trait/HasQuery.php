<?php

namespace App\Trait;

use Illuminate\Support\Facades\DB;

trait HasQuery
{
    public function scopeWithRelations($query, array $with = [])
    {
        return $query->with($with)->withCount($with);
    }
    // public function scropeKeyword(){
    //     foreach()
    // }
}
