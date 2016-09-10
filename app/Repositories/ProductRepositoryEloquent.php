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

    public function getDataWithType($type, $locale = 'vi', $columns = ['*'])
    {
        return $this->model->where('type', $type)->where('locale', $locale)->orderBy('id', 'DESC')->get($columns);
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

    public function search($value, $locale = 'vi', $paginate = 16, $columns = ['*'])
    {
        return $this->model->where('locale', $locale)
        ->where(function ($query) use ($value) {
            $query->where('name', 'LIKE', '%'.$value.'%')
                    ->orWhere('code','LIKE','%'.$value.'%')
                    ->orWhere('guarantee','LIKE','%'.$value.'%')
                    ->orWhere('price','LIKE','%'.$value.'%');
        })->orderBy('id','DESC')->paginate($paginate);
    }

    public function getFeatured($type, $locale = 'vi')
    {
        return $this->model
            ->where('type', $type)
            ->where('locale', $locale)
            ->where('featured', 1)
            ->limit(4)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
