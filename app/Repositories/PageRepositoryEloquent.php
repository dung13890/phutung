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
    	return $this->model->orderBy('id', 'desc')->get($columns);
    }

    public function allTags($paginate = 9)
    {
    	return $this->model->allTags()->paginate($paginate);
    }
}
