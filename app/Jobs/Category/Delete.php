<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Repositories\Contracts\CategoryRepository;
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
    public function handle(CategoryRepository $repository)
    {
        if ($this->entity->id <= 6) {
            return;
        }
        if (count($this->entity->children)) {
            $this->entity->children()->delete();
        }

        if (count($this->entity->images)) {
            $this->entity->images()->delete();
        }

        $repository->delete($this->entity);
    }
}
