<?php

namespace App\Jobs\File;

use App\Jobs\Job;
use App\Repositories\Contracts\FileRepository;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Jobs\UploadableTrait;

class Delete extends Job
{
    use UploadableTrait;
    
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
    public function handle(FileRepository $repository)
    {
        if (!empty($this->entity->file)) {
            $this->destroyFile($this->entity->file);
        }
        $repository->delete($this->entity);
    }
}
