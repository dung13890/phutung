<?php

namespace App\Http\Controllers\Backend;

use Bouncer;
use App\Http\Requests\Backend\RoleRequest;
use Silber\Bouncer\Database\Role;
use App\Services\Contracts\RoleService;

class RoleController extends BackendController
{
    protected $abilities;

    public function __construct(Role $role)
    {
        parent::__construct($role);
        $this->abilities = Bouncer::Ability()->all()->groupBy(function ($item, $key) {
            $parts = explode('-', $item->name);
            $item->name = $parts[1] . '-' . trans('repositories.'.$parts[0]);
            return $parts[0];
        });
    }

    public function index()
    {
    	$this->before(__FUNCTION__);
    	parent::index();
    	$this->compacts['roles'] = Bouncer::Role()->where('id','<>',1)->with('abilities')->get();
    	return $this->viewRender();
    }

    public function create()
    {
    	$this->before(__FUNCTION__);
    	parent::create();
    	$this->compacts['abilities'] = $this->abilities;
    	return $this->viewRender();
    }

    public function store(RoleRequest $request, RoleService $service)
    {
        $this->before(__FUNCTION__);
    	$data = $request->all();
    	return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);
        $this->compacts['abilities'] = $this->abilities;
        return $this->viewRender();
    }

    public function update(RoleRequest $request, RoleService $service, $id)
    {
    	$data = $request->all();
    	$entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->updateData($data, $service, $entity);
    }

    public function destroy(RoleService $service, $id)
    {
    	$entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
    	return $this->deleteData($service, $entity);
    }
}
