<?php

namespace App\Jobs\Position;

use App\Jobs\Job;
use App\Repositories\Contracts\PositionRepository;

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
    public function handle(PositionRepository $repository)
    {
        $page = $repository->create($this->attributes);
    }
}
