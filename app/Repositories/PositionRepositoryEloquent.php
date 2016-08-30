<?php

namespace App\Repositories;

use App\Eloquent\Position;
use App\Repositories\Contracts\PositionRepository;

class PositionRepositoryEloquent extends AbstractRepositoryEloquent implements PositionRepository
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }

    public function getPosition($limit, $columns = ['*'])
    {
    	return $this->model->where('locked',false)->take($limit)->get($columns);
    }
}
