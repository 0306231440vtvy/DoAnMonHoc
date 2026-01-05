<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\BaseService;

class UserService extends BaseService implements UserServiceInterface
{
    protected $repository;
    public function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
    }
    public function getRepository()
    {
        return $this->repository;
    }
}
