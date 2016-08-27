<?php

namespace App\Jobs\Upload;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use App\Repositories\Contracts\ImageRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
    use UploadableTrait;

    protected $attributes;

    protected $entity;

    public function __construct(Model $entity, array $attributes)
    {
        $this->entity = $entity;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ImageRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        if (isset($this->attributes['src'])) {
            if (!empty($this->entity->src)) {
                $this->destroyFile($this->entity->src);
            }
            $this->attributes['src'] = $this->uploadFile($this->attributes['src'], $path);
        }
        $repository->update($this->entity, $this->attributes);

        return $this->entity;
    }
}
