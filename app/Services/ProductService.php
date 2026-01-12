<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    protected $repository;
    public function __construct(
        ProductRepository $repository
    ) {
        $this->repository = $repository;
    }
}
