<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProviderRequest;
use App\Repositories\Contracts\ProviderRepository;
use App\Services\Contracts\ProviderService;

class ProviderController extends BackendController
{
    protected $dataSelect = ['id','image','name', 'email', 'phone', 'address', 'locked'];

    public function __construct(ProviderRepository $provider)
    {
        parent::__construct($provider);
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

    public function store(ProviderRequest $request,ProviderService $service)
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

    public function update(ProviderRequest $request,ProviderService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(SlideService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }
}
