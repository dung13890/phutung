<?php

namespace App\Repositories;

use App\Eloquent\Provider;
use App\Repositories\Contracts\ProviderRepository;

class ProviderRepositoryEloquent extends AbstractRepositoryEloquent implements ProviderRepository
{
    public function __construct(Provider $model)
    {
        parent::__construct($model);
    }
}
