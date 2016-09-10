<?php

namespace App\Repositories;

use App\Eloquent\Page;
use App\Repositories\Contracts\PageRepository;

class PageRepositoryEloquent extends AbstractRepositoryEloquent implements PageRepository
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function datatables($columns = ['*'],  $with = [])
    {
        $locale = session()->has('locale') ? session('locale') : 'vi';
        return $this->model->with($with)->where('locale', $locale)->orderBy('id', 'desc')->get($columns);
    }

    public function allTags($paginate = 9)
    {
    	return $this->model->allTags()->paginate($paginate);
    }

    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

    public function getByLocale($locale, $columns = ['*'])
    {
        return $this->model->where('locale', $locale)->where('locked', false)->get($columns);
    }

    public function getPage($limit, $locale = 'vi', $columns = ['*'])
    {
        return $this->model->where('locked',false)->where('locale', $locale)->take($limit)->get($columns);
    }

    public function getActivedByLocale($locale = 'vi', $columns = ['*'])
    {
        return $this->model
            ->where('locked', false)
            ->where('locale', $locale)
            ->get($columns);
    }
}
