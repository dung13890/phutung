<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PageRequest;
use App\Repositories\Contracts\PageRepository;
use App\Services\Contracts\PageService;

class PageController extends BackendController
{
    protected $dataSelect = ['id','name','intro','created_at','locked'];

    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
    }

    public function index()
    {
        $this->before(__FUNCTION__);
        parent::index();
        
        return $this->viewRender();
    }

    public function create()
    {
    	$this->before(__FUNCTION__);
        parent::create();

        return $this->viewRender();
    }

    public function store(PageRequest $request, PageService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->all();
        
        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
    	$this->before(__FUNCTION__, $this->compacts['item']);
        $this->compacts['tags'] = $this->compacts['item']->tags->lists('name','name')->all();

        return $this->viewRender();
    }

    public function update(PageRequest $request, PageService $service, $id)
    {
    	$data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function getTags()
    {
        return $this->repository->allTags(9);
    }

    public function destroy(PageService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }
}
