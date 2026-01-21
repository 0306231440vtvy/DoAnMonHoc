<?php

namespace App\Repositories;

use App\Models\Sanpham;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{
    public function __construct(
        Sanpham $model
    ) {
        $this->model = $model;
    }
    public function pagination(array $specs = [])
    {
        $query = DB::table('sanpham')
            ->join('sanpham_variants', 'sanpham.id', '=', 'sanpham_variants.sanpham_id');
        // return parent::pagination($specs);
        return $query->paginate($specs['perpage'] ?? 20);
    }
}
