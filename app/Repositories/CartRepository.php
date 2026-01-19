<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Giohang;

class CartRepository extends BaseRepository
{
    public function __construct(Giohang $model)
    {
        $this->model = $model;
    }
}
