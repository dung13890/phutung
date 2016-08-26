<?php

namespace App\Jobs\Post;

use App\Jobs\Job;
use App\Repositories\Contracts\PostRepository;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Jobs\UploadableTrait;

class Delete extends Job
{
    use UploadableTrait;
    
    protected $entity;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(PostRepository $repository)
    {
        if ($this->entity->tags->all()) {
            $this->entity->untag();
        }
        if (!empty($this->entity->image)) {
            $this->destroyFile($this->entity->image);
        }
        $repository->delete($this->entity);
    }
}
