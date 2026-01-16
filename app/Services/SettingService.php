<?php

namespace App\Services;

use App\Repositories\SettingRepository;
use App\Services\BaseService;

class SettingService extends BaseService
{
    protected $repository;
    public function __construct(
        SettingRepository $repository
    ) {
        $this->repository = $repository;
    }
}
