<?php

namespace App\Repositories;

use App\Eloquent\Menu;
use App\Repositories\Contracts\MenuRepository;

class MenuRepositoryEloquent extends AbstractRepositoryEloquent implements MenuRepository
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }

    public function getRoot($locale = 'vi', $columns = ['*'])
    {
    	return $this->model->with('children')->where('locale', $locale)->where('parent_id', 0)->orderBy('order')->get($columns);
    }
}
