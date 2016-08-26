<?php

namespace App\Repositories;

use App\Eloquent\Image;
use App\Repositories\Contracts\ImageRepository;

class ImageRepositoryEloquent extends AbstractRepositoryEloquent implements ImageRepository
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}
