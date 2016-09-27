<?php

namespace App\Repositories;

use App\Eloquent\Slide;
use App\Repositories\Contracts\SlideRepository;

class SlideRepositoryEloquent extends AbstractRepositoryEloquent implements SlideRepository
{
    public function __construct(Slide $model)
    {
        parent::__construct($model);
    }

    public function getSlide($limit, $columns = ['*'])
    {
    	return $this->model->where('locked',false)->orderBy('sort', 'ASC')->take($limit)->get($columns);
    }
}
