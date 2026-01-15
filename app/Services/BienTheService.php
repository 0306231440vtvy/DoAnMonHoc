<?php

namespace App\Services;

use App\Models\BienThe;
use App\Repositories\BienTheRepository;
use App\Services\BaseService;

class BienTheService extends BaseService
{
    protected $repository;
    public function __construct(
        BienTheRepository $repository
    ) {
        $this->repository = $repository;
    }
}
