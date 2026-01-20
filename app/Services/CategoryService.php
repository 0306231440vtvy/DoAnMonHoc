<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    protected $repository;
    public function __construct(
        CategoryRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function search($keyword){
        if(!$keyword)
        {
            return $this->repository->paginate();
        }
        return $this->repository->search($keyword);
            
    }

    public function findByID($id){
        return $this->repository->findById($id);
    }

    public function destroy($id){
        return $this->repository->destroy($id);
    }

    public function update($id, $request){
        try {
            $this->beginTransaction();

            $fillable = $this->repository->getFillable();
            $payload = $request->only($fillable);

            $model = $this->repository->update($id, $payload);
            $this->commit();
            return $model;
        } catch (\Throwable $th) {
            $this->rollBack();
            throw $th;
        }
    }
}
