<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
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
    public function handle(CategoryRepository $repository)
    {
        if (isset($this->attributes['type'])) {
            unset($this->attributes['type']);
        }
        return $repository->update($this->entity, $this->attributes);
    }
}
