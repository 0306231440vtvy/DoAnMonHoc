<?php

namespace App\Services;

use App\Repositories\SlideRepository;
use App\Services\BaseService;

class SlideService extends BaseService
{
    protected $repository;
    public function __construct(
        SlideRepository $repository
    ) {
        $this->repository = $repository;
    }
}
