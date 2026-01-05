<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    protected $repository;
    public function __construct(
        CategoryRepository $repository
    ) {
        $this->repository = $repository;
    }
    public function getRepository()
    {
        return $this->repository;
    }
}
