<?php

namespace App\Jobs\Property;

use App\Jobs\Job;
use App\Repositories\Contracts\PropertyRepository;
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
    public function handle(PropertyRepository $repository)
    {
        $repository->delete($this->entity);
    }
}
