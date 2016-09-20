<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\FileRequest;
use App\Repositories\Contracts\FileRepository;
use App\Services\Contracts\FileService;

class FileController extends BackendController
{
    protected $dataSelect = ['id','file', 'name', 'locked'];

    public function __construct(FileRepository $file)
    {
        parent::__construct($file);
    }

    public function index()
    {
        parent::index();
        
        return $this->viewRender();
    }

    public function create()
    {
        parent::create();

        return $this->viewRender();
    }

    public function store(FileRequest $request, FileService $service)
    {
        $data = $request->all();

        \Cache::forget('__files');
        
        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->viewRender();
    }

    public function update(FileRequest $request, FileService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        \Cache::forget('__files');

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(FileService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);

        \Cache::forget('__files');

        return $this->deleteData($service, $entity);
    }
}
