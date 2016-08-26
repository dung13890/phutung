<?php

namespace App\Jobs\Property;

use App\Jobs\Job;
use App\Repositories\Contracts\PropertyRepository;

class Store extends Job
{
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
    public function handle(PropertyRepository $repository)
    {
        return $repository->create($this->attributes);
    }
}
