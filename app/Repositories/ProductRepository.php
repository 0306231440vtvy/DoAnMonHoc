<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function __construct(
        Product $model
    ) {
        // parent::__construct($model);
        $this->model = $model;
    }
    public function getModel()
    {
        return Product::class;
    }
}
