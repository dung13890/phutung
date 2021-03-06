<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Traits\Jobs\UploadToImageTrait;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Database\Eloquent\Model;

class Update extends Job
{
    use UploadToImageTrait;

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
        if ($this->entity->id <= 6 ) {
            unset($this->attributes['order']);
        }
        if (isset($this->attributes['type'])) {
            unset($this->attributes['type']);
        }

        if (isset($this->attributes['banner'])) {
            $banner = $this->uploadToImage($this->attributes['banner'], $this->entity->banner, $this->attributes['slogan']);
            $this->entity->images()->save($banner);
        }

        $repository->update($this->entity, $this->attributes);
    }
}
