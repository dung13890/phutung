<?php

namespace App\Jobs\Post;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\PostRepository;

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
    public function handle(PostRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        $this->attributes['user_id'] = \Auth::user()->id;
        if (isset($this->attributes['image'])) {
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }
        $post = $repository->create($this->attributes);
        $post->categories()->sync($this->attributes['category_id']);
        if (isset($this->attributes['tags'])) {
            $post->setTags($this->attributes['tags']);
        }
    }
}
