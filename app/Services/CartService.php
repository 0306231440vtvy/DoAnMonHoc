<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class CartService extends BaseService
{
    protected $simpleFilter = [
        'user_id',
    ];
    public function __construct(CartRepository $repository)
    {
        $this->repository = $repository;
    }
    protected function prepageModeldata(Request $request): self
    {
        return $this;
    }
}
