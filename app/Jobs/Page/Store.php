<?php

namespace App\Jobs\Page;

use App\Jobs\Job;
use App\Repositories\Contracts\PageRepository;

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
    public function handle(PageRepository $repository)
    {
        $page = $repository->create($this->attributes);
        if (isset($this->attributes['tags'])) {
            $page->setTags($this->attributes['tags']);
        }
    }
}
