<?php

namespace App\Repositories;

use App\Models\Slide;
use App\Repositories\BaseRepository;

class SlideRepository extends BaseRepository
{
    public function __construct(
        Slide $model
    ) {
        // parent::__construct($model);
        $this->model = $model;
    }
}
