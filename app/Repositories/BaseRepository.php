<?php

namespace App\Repositories;

use App\Trait\HasQuery;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    use HasQuery;
    protected $model;
    public function __construct(
        Model $model
    ) {
        $this->model = $model;
    }
    public function pagination(array $specs = [])
    {
        return $this->model
            // ->scopeWithRelations($specs['with'])
            ->when(
                $specs['type'],
                fn($q) => $q->get(),
                fn($q) => $q->paginate($specs['perpage'])
            );
    }
    // public function index()
    // {
    //     return $this->model->all();
    // }
    public function create(array $payload = []): Model | null
    {
        return $this->model->create($payload)->fresh();
    }
    public function findById(int $id = 0, array $relation = [], array $column = ['*']): Model | null
    {
        return $this->model->select($column)->with($relation)->find($id);
    }
    public function findByField(string $field, $value, array $relation = [], array $column = ['*']): Model |null
    {
        return $this->model->select($column)->with($relation)->where($field, $value)->first();
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
