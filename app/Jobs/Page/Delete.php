<?php

namespace App\Jobs\Page;

use App\Jobs\Job;
use App\Repositories\Contracts\PageRepository;
use Illuminate\Database\Eloquent\Model;

class Delete extends Job
{
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
    public function handle(PageRepository $repository)
    {
        if ($this->entity->tags->all()) {
            $this->entity->untag();
        }
        $repository->delete($this->entity);
    }
}
