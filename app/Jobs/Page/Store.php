<?php

namespace App\Jobs\Page;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\PageRepository;

class Store extends Job
{
    use UploadableTrait;

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
        $path = strtolower(class_basename($repository->getModel()));

        if (isset($this->attributes['image'])) {
            $this->attributes['image'] = $this->uploadFile($this->attributes['image'], $path);
        }

        $page = $repository->create($this->attributes);
        
        $page->seo()->create([
            'title' => $this->attributes['seo_title'],
            'description' => $this->attributes['seo_description'],
            'keywords' => $this->attributes['seo_keywords']
        ]);
    }
}
