<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Repositories\Contracts\CategoryRepository;

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
    public function handle(CategoryRepository $repository)
    {
        return $repository->create($this->attributes);
    }
}
