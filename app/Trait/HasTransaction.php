<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait HasTransaction
{
    public function beginTransaction(): self
    {
        DB::beginTransaction();
        return $this;
    }
    public function commit(): self
    {
        DB::commit();
        return $this;
    }
    public function rollBack()
    {
        DB::rollBack();
    }
    public function checkExistsId(?int $id = null): self
    {
        if ($this->model != $this->repository->findById($id)) {
            throw new ModelNotFoundException('Không tồn tại record này');
        }
        return $this;
    }
    public function beforeDelete(Request $request, ?int $id = null): self
    {
        if ($id) {
            $this->checkExistsId($id);
        }
        return $this;
    }
    public function afterDelete(): self
    {
        return $this;
    }
}
