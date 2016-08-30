<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PositionRequest;
use App\Repositories\Contracts\PositionRepository;
use App\Services\Contracts\PositionService;

class PositionController extends BackendController
{
    protected $dataSelect = ['id','name', 'address','phone','email','locked'];

    public function __construct(PositionRepository $position)
    {
        parent::__construct($position);
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

    public function store(PositionRequest $request, PositionService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->all();
        
        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
    	$this->before(__FUNCTION__, $this->compacts['item']);

        return $this->viewRender();
    }

    public function update(PositionRequest $request, PositionService $service, $id)
    {
    	$data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(PositionService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }
}
