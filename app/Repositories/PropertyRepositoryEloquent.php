<?php

namespace App\Repositories;

use App\Eloquent\Property;
use App\Repositories\Contracts\PropertyRepository;

class PropertyRepositoryEloquent extends AbstractRepositoryEloquent implements PropertyRepository
{
    public function __construct(Property $model)
    {
        parent::__construct($model);
    }
}
