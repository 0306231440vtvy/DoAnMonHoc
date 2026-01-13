<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;
    public function __construct()
    {
        $this->setModel();
    }
    abstract public function getModel();
    
    public function setModel()
    {
        // Dùng app()->make() để khởi tạo Model từ chuỗi tên class
        $this->model = app()->make($this->getModel());
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
    public function index()
    {
        return $this->model->all();
    }
    public function create(array $payload = []): Model | null
    {
        return $this->model->create($payload)->fresh();
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
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