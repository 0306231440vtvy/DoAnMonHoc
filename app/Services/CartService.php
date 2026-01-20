<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Services\BaseService;

class CartService extends BaseService
{
    protected $simpleFilter = [
        'user_id',
    ];
    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }
}
