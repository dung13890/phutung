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

    public function getDataWithLocale($locale = 'vi', $columns = ['*'])
    {
        return $this->model->where('type', '<>', 'post')->where('locale', $locale)->get($columns);
    }

    public function getDataWithType($type, $locale = 'vi', $columns = ['*'])
    {
    	return $this->model->where('type',$type)->where('locale', $locale)->get($columns);
    }

    public function getRootWithType($type, $locale = 'vi', $columns = ['*'])
    {
    	return $this->model->with('children')->where('locale', $locale)->where('parent_id',0)->where('type',$type)->orderBy('order')->get($columns);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

    public function getFirstWithType($type, $locale = 'vi', $columns = ['*'])
    {
        return $this->model->where('parent_id', 0)->where('type', $type)->where('locale', $locale)->first();
    }

}
