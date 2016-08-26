<?php

namespace App\Repositories;

use App\Eloquent\Config;
use App\Repositories\Contracts\ConfigRepository;

class ConfigRepositoryEloquent extends AbstractRepositoryEloquent implements ConfigRepository
{
    public function __construct(Config $model)
    {
        parent::__construct($model);
    }

    public function findByKey($key)
    {
    	return $this->model->where('key', $key)->first();
    }
}
