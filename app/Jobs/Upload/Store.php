<?php

namespace App\Jobs\Upload;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\ImageRepository;

class Store extends Job
{
    use UploadableTrait;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(ImageRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        $this->attributes['src'] = $this->uploadFile($this->attributes['src'], $path);

        return $repository->create($this->attributes);
    }
}
