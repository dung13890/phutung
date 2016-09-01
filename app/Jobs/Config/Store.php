<?php

namespace App\Jobs\Config;

use App\Jobs\Job;
use App\Repositories\Contracts\ConfigRepository;
use App\Traits\Jobs\UploadableTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public function handle(ConfigRepository $repository)
    {
        $path = strtolower(class_basename($repository->getModel()));
        $locale = $this->attributes['locale'];
        unset($this->attributes['locale']);

        if (isset($this->attributes['logo']) && $this->attributes['logo']) {
            $this->uploadImageConfig($this->attributes['logo'], 'logo', $path, $locale);
            unset($this->attributes['logo']);
        }

        if (isset($this->attributes['box_left_image']) && $this->attributes['box_left_image']) {
            $this->uploadImageConfig($this->attributes['box_left_image'], 'box_left_image', $path, $locale);
            unset($this->attributes['box_left_image']);
        }

        if (isset($this->attributes['box_right_image']) && $this->attributes['box_right_image']) {
            $this->uploadImageConfig($this->attributes['box_right_image'], 'box_right_image', $path, $locale);
            unset($this->attributes['box_right_image']);
        }

        foreach ($this->attributes as $key => $value) {
            $repository->findByKey($key, $locale)->update(['value' => $value]);
        }
    }

    public function uploadImageConfig(UploadedFile $file, $key, $path, $locale)
    {
        $image = app(ConfigRepository::class)->findByKey($key, $locale);

        if (!empty($image->value)) {
            $this->destroyFile($image->value);
        }

        $src = $this->uploadFile($file, $path);
        
        $image->update(['value' => $src]);
        
    }
}
