<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;
    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }
    // public function pagination(array $specs = [])
    // {
    //     return $this->model
    //         ->orderBy($specs['sort'][0], $specs['sort'][1])
    //         ->when(
    //             $specs['type'],
    //             fn($q) => $q->get(),
    //             fn($q) => $q->paginate($specs['perpage'])
    //         );
    // }
    public function create(array $payload = []): Model | null
    {
        return $this->model->create($payload)->fresh();
    }
    public function findById(int $id = 0, array $relation = [], array $column = ['*']): Model | null
    {
        return $this->model->select($column)->with($relation)->find($id);
    }
    public function getFillable(): array
    {
        return $this->model->getFillable();
    }
    public function delete(int $id = 0): bool
    {
        return $this->model->findById($id)->delete();
    }
}
