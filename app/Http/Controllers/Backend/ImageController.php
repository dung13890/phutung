<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ImageRequest;
use App\Repositories\Contracts\ImageRepository;
use App\Services\Contracts\UploadService;

class ImageController extends BackendController
{
    public function __construct(ImageRepository $image)
    {
        parent::__construct($image);
    }

    public function store(ImageRequest $request, UploadService $service)
    {   
        $data = $request->only('name','src','size','type');

        return $service->store($data);
    }
}
