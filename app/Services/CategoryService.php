<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    protected $repository;
    public function __construct(
        CategoryRepository $repository
    ) {
        $this->repository = $repository;
    }
    public function getPublish()
    {
        $category = Category::where('publish', 1)->get();
        return $category;
    }
}
