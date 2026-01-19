<?php

namespace App\Services;

use App\Repositories\ContactRepository;
use App\Services\BaseService;

class ContactService extends BaseService
{
    protected $repository;
    public function __construct(
        ContactRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function filterContact(array $filer){
        return $this->repository->filter($filer);
    }

    public function updateContact($id){
        return $this->repository->updateContact($id);
    }

    public function destroyContact($id){
        return $this->repository->destroyContact($id);
    }
}