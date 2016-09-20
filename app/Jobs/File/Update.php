<?php

namespace App\Jobs\File;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\FileRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
    use UploadableTrait;

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
    public function handle(FileRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['file'])) {
            if (!empty($this->entity->file)) {
                $this->destroyFile($this->entity->file);
            }
            $this->attributes['file'] = $this->uploadFile($this->attributes['file'], $path, 'file');
        }
        $repository->update($this->entity, $this->attributes);
    }
}
