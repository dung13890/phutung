<?php

namespace App\Repositories;

use App\Eloquent\File;
use App\Repositories\Contracts\FileRepository;

class FileRepositoryEloquent extends AbstractRepositoryEloquent implements FileRepository
{
    public function __construct(File $model)
    {
        parent::__construct($model);
    }

    public function getFile($limit, $columns = ['*'])
    {
    	return $this->model->where('locked',false)->orderBy('id','DESC')->take($limit)->get($columns);
    }
}
