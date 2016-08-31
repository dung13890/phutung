<?php

namespace App\Jobs\Provider;

use App\Jobs\Job;
use App\Repositories\Contracts\ProviderRepository;
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
    public function handle(ProviderRepository $repository)
    {
        if (!empty($this->entity->image)) {
            $this->destroyFile($this->entity->image);
        }
        
        $repository->delete($this->entity);
    }   
}
