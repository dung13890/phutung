<?php

namespace App\Jobs\File;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\FileRepository;

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
    public function handle(FileRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['file'])) {
            $this->attributes['file'] = $this->uploadFile($this->attributes['file'], $path, 'file');
        }

        $post = $repository->create($this->attributes);
    }
}
