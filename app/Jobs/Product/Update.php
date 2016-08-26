<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\ImageRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
    use UploadableTrait;

    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->attributes = $attributes;
        $this->entity = $entity;
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
            if (!empty($this->entity->image)) {
                $this->destroyFile($this->entity->image);
            }
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }
        $repository->update($this->entity, $this->attributes);
        if (isset($this->attributes['category_id'])) {
            $this->entity->categories()->sync($this->attributes['category_id']);
        }
        if (isset($this->attributes['property_id'])) {
            $this->entity->properties()->sync($this->attributes['property_id']);
        }
        if (isset($this->attributes['tags'])) {
            $this->entity->setTags($this->attributes['tags']);
        }
        if (isset($this->attributes['image_id'])) {
            $this->entity->images()->whereNotIn('id', $this->attributes['image_id'])->delete();
            $this->entity->images()->saveMany($imageRepository->find($this->attributes['image_id']));
        }
    }
}
