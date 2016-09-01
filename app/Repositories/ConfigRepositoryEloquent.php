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

    public function findByKey($key, $locale = 'vi')
    {
    	return $this->model->where('key', $key)->where('locale', $locale)->first();
    }

    public function getByLocale($locale, $columns = ['*'])
    {
    	return $this->model->where('locale', $locale)->get($columns);
    }
}
