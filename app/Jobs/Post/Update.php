<?php

namespace App\Jobs\Post;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\PostRepository;
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
    public function handle(PostRepository $repository)
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
        if (isset($this->attributes['tags'])) {
            $this->entity->setTags($this->attributes['tags']);
        }
    }
}
