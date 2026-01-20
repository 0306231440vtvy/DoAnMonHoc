<?php

namespace App\Services;

use App\Repositories\SlideRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class SlideService extends BaseService
{
    protected $repository;
    public function __construct(
        SlideRepository $repository
    ) {
        $this->repository = $repository;
    }
    protected function prepageModeldata(Request $request): self
    {
        return $this;
    }
}
