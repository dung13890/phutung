<?php

namespace App\Jobs\Property;

use App\Jobs\Job;
use App\Repositories\Contracts\PropertyRepository;
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
    public function handle(PropertyRepository $repository)
    {
        $repository->update($this->entity, $this->attributes);
    }
}
