<?php

namespace App\Jobs\Category;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;
use Illuminate\Database\Eloquent\Model;

class StoreDesign extends Job
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
    public function handle()
    {
        if (isset($this->attributes['design_image'])) {
            $this->attributes['design_image'] = $this->uploadFile($this->attributes['design_image'], 'design');
        }

        $this->entity->designs()->create([
            'name' => $this->attributes['design_name'],
            'image' => $this->attributes['design_image'],
            'link' => $this->attributes['design_link'],
            'order' => $this->attributes['design_order'],
        ]);
    }
}
