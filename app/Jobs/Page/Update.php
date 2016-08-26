<?php

namespace App\Jobs\Page;

use App\Jobs\Job;
use App\Repositories\Contracts\PageRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
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
    public function handle(PageRepository $repository)
    {
        $repository->update($this->entity, $this->attributes);
        if (isset($this->attributes['tags'])) {
            $this->entity->setTags($this->attributes['tags']);
        }
    }
}
