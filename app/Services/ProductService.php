<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class ProductService extends BaseService
{
    protected $repository;
    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }
}
