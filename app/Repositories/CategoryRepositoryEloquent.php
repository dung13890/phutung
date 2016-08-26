<?php

namespace App\Repositories;

use App\Eloquent\Category;
use App\Repositories\Contracts\CategoryRepository;

class CategoryRepositoryEloquent extends AbstractRepositoryEloquent implements CategoryRepository
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getDataWithType($type, $columns = ['*'])
    {
    	return $this->model->where('type',$type)->get($columns);
    }

    public function getRootWithType($type, $columns = ['*'])
    {
    	return $this->model->with('children')->where('parent_id',0)->where('type',$type)->get($columns);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

}
