<?php

namespace App\Services;

use App\Models\ThuongHieu;
use App\Repositories\ThuongHieuRepository;
use App\Services\BaseService;

class ThuongHieuService extends BaseService
{
    protected $repository;
    public function __construct(
        ThuongHieuRepository $repository
    ) {
        $this->repository = $repository;
    }
}
