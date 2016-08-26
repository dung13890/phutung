<?php

namespace App\Jobs\Product;

use App\Jobs\Job;
use App\Repositories\Contracts\ProductRepository;
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
    public function handle(ProductRepository $repository)
    {
        if ($this->entity->tags->all()) {
            $this->entity->untag();
        }
        if (!empty($this->entity->image)) {
            $this->destroyFile($this->entity->image);
        }
        if (count($this->entity->images)) {
            $this->entity->images()->delete();
        }
        $repository->delete($this->entity);
    }
}
