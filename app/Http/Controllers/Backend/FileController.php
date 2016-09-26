<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\FileRequest;
use App\Repositories\Contracts\FileRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\FileService;

class FileController extends BackendController
{
    protected $dataSelect = ['id','file', 'name', 'locked'];

    protected $categorySelect = ['id', 'name', 'type'];

    protected $categoryRepository;

    public function __construct(FileRepository $file, CategoryRepository $category)
    {
        parent::__construct($file);
        $this->categoryRepository = $category;
    }

    public function index()
    {
        parent::index();
        
        return $this->viewRender();
    }

    public function create()
    {
        parent::create();
        $this->compacts['listCategory'] = $this->categoryRepository->getDataWithLocale($this->locale, $this->categorySelect)->sortBy('type')->map(function ($item) {
            $item->name = $item->name . ' - ' . $this->trans($item->type);
            return $item;
        })->lists('name', 'id')->prepend('Chọn chuyên mục', 0);

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
        $this->compacts['listCategory'] = $this->categoryRepository->getDataWithLocale($this->locale, $this->categorySelect)->sortBy('type')->map(function ($item) {
            $item->name = $item->name . ' - ' . $this->trans($item->type);
            return $item;
        })->lists('name', 'id')->prepend('Chọn chuyên mục', 0);

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
