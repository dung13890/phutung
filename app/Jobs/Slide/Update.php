<?php

namespace App\Jobs\Slide;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\SlideRepository;
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
    public function handle(SlideRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['image'])) {
            if (!empty($this->entity->image)) {
                $this->destroyFile($this->entity->image);
            }
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }
        $repository->update($this->entity, $this->attributes);
    }
}
