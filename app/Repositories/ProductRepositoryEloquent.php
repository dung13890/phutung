<?php

namespace App\Repositories;

use App\Eloquent\Product;
use App\Repositories\Contracts\ProductRepository;

class ProductRepositoryEloquent extends AbstractRepositoryEloquent implements ProductRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function getDataWithType($type, $columns = ['*'])
    {
        return $this->model->where('type', $type)->orderBy('id', 'DESC')->get($columns);
    }

    public function allTags($paginate = 9)
    {
    	return $this->model->allTags()->paginate($paginate);
    }

    public function featured($limit, $columns = ['*'])
    {
        return $this->model->where('locked',false)->orderBy('id','DESC')->take($limit)->get($columns);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

    public function random($limit, $columns = ['*'])
    {
        return $this->model->where('locked', false)->orderByRaw("RAND()")->take($limit)->get($columns);
    }
}
