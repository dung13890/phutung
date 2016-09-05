<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SlideRequest;
use App\Repositories\Contracts\SlideRepository;
use App\Services\Contracts\SlideService;

class SlideController extends BackendController
{
    protected $dataSelect = ['id','image','name','locked'];

    public function __construct(SlideRepository $slide)
    {
        parent::__construct($slide);
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

    public function store(SlideRequest $request, SlideService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->all();

        \Cache::forget('__slides');
        
        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);

        return $this->viewRender();
    }

    public function update(SlideRequest $request, SlideService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        \Cache::forget('__slides');

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(SlideService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        \Cache::forget('__slides');

        return $this->deleteData($service, $entity);
    }
}
