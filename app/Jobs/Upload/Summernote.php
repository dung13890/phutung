<?php

namespace App\Jobs\Upload;

use App\Jobs\Job;
use App\Traits\Jobs\UploadableTrait;

class Summernote extends Job
{
    
    use UploadableTrait;

    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle()
    {
        $path = 'summernote';
        if (isset($this->attributes['image'])) {
            return $this->uploadFile($this->attributes['image'], $path);
        }
    }
}
