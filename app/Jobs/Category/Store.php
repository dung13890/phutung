<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Traits\Jobs\UploadToImageTrait;
use App\Repositories\Contracts\CategoryRepository;

class Store extends Job
{
    use UploadToImageTrait;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CategoryRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        $category = $repository->create($this->attributes);

        if (isset($this->attributes['banner'])) {
            $banner = $this->uploadToImage($this->attributes['banner']);
            $category->images()->save($banner);
        }

        return $category; 
    }

}
