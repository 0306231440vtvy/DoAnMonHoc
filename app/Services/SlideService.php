<?php

namespace App\Services;

use App\Repositories\SlideRepository;
use App\Services\Interfaces\SlideServiceInterface;
use App\Services\BaseService;

class SlideService extends BaseService implements SlideServiceInterface
{
    protected $repository;
    public function __construct(
        SlideRepository $repository
    ) {
        $this->repository = $repository;
    }
}
