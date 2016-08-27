<?php

namespace App\Traits\Jobs;

use App\Services\Contracts\UploadService;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UploadToimageTrait
{
    public function uploadToImage(UploadedFile $file, Model $entity = null, $name = null)
    {
        $name ? $name : Str::ascii($file->getClientOriginalName());
        
        $data = [
            'src' => $file,
            'name' => $name,
            'size' => $file->getSize(),
            'type' => $file->getMimeType()
        ];

        if (!$entity) {
            return app(UploadService::class)->store($data);
        }

        return app(UploadService::class)->update($entity, $data);
    }

}