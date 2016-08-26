<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Repositories\Contracts\MenuRepository;
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
    public function handle(MenuRepository $repository)
    {
        if (count($this->entity->children)) {
            $this->entity->children()->delete();
        }
        $repository->delete($this->entity);
    }
}
