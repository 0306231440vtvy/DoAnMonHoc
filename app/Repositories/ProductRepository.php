<?php

namespace App\Repositories;

use App\Models\Sanpham;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct(
        Sanpham $model
    ) {
        $this->model = $model;
    }
}
