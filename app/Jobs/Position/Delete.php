<?php

namespace App\Jobs\Position;

use App\Jobs\Job;
use App\Repositories\Contracts\PositionRepository;
use Illuminate\Database\Eloquent\Model;


class Delete extends Job
{
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
    public function handle(PositionRepository $repository)
    {
        $repository->delete($this->entity);
    }
}
