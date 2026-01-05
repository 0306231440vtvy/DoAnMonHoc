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
    // protected $perpage = 10;
    public function __construct(
        BaseRepository $repository
    ) {
        $this->repository = $repository;
    }
    // public function specifications(Request $request): array
    // {
    //     return [
    //         'type' => $request->type === 'all',
    //         'perpage' => $request->perpage ?? $this->perpage,
    //     ];
    // }
    // public function pagination()
    // {
    //     // return $this->repository->;
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
}
