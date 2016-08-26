<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\ImageRepository;

class Store extends Job
{
    use UploadableTrait;

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
    public function handle(ProductRepository $repository, ImageRepository $imageRepository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        $this->attributes['user_id'] = \Auth::user()->id;
        if (isset($this->attributes['image'])) {
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }
        $product = $repository->create($this->attributes);
        $product->categories()->sync($this->attributes['category_id']);
        if (isset($this->attributes['tags'])) {
            $product->setTags($this->attributes['tags']);
        }
        if (isset($this->attributes['property_id'])) {
            $product->properties()->sync($this->attributes['property_id']);
        }
        if (isset($this->attributes['image_id'])) {
            $product->images()->saveMany($imageRepository->find($this->attributes['image_id']));
        }
    }
}
