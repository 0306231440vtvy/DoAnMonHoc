<?php

namespace App\Services;

use App\Repositories\BaseRepository;
use App\Services\Interfaces\BaseServiceInterface;
use App\Trait\HasTransaction;
use Illuminate\Http\Request;

abstract class BaseService implements BaseServiceInterface
{
    use HasTransaction;
    protected $repository;
    protected $perpage = 20;
    protected $with = [];
    public function __construct(
        Baserepository $repository
    ) {
        $this->repository = $repository;
    }
    public function specifications(Request $request): array
    {
        return [
            'type' => $request->type === 'all',
            'with' => $this->with,
            'perpage' => $request->perpage ?? $this->perpage,
        ];
    }
    public function pagination(Request $request)
    {
        $specs = $this->specifications($request);
        return $this->repository->pagination($specs);
    }
    // public function index()
    // {
    //     return $this->repository->index();
    // }
    public function create(Request $request)
    {
        try {
            $this->beginTransaction();
            $fillable = $this->repository->getFillable();
            $payload = $request->only($fillable);
            $model = $this->repository->create($payload);
            $this->commit();
            return $model;
        } catch (\Throwable $th) {
            $this->rollBack();
            throw $th;
        }
    }
    public function show(string $field, $value)
    {
        return $this->repository->findByField($field, $value);
    }
}
