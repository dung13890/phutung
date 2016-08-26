<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PropertyRequest;
use App\Repositories\Contracts\PropertyRepository;
use App\Services\Contracts\PropertyService;

class PropertyController extends BackendController
{
    protected $dataSelect = ['id','key','name'];

    public function __construct(PropertyRepository $property)
    {
        parent::__construct($property);
    }

    public function index()
    {
    	parent::index();
    	$items = $this->repository->all($this->dataSelect);
    	$this->compacts['groupList'] = $items->lists('key','key')->prepend('Create',0);    	
    	$results = [];
    	foreach ($items->groupBy('key') as $key=>$value) {
    		$result['name'] = $key;
    		$result['children'] = $value->all();
    		array_push($results,$result);
    	}
    	$this->compacts['items'] = json_encode($results);
    	return $this->viewRender();
    }

    public function store(PropertyRequest $request, PropertyService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->only('name','key');

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
    	$this->before(__FUNCTION__, $this->compacts['item']);
    	$this->compacts['action'] = 'Edit';

    	return $this->index();
    }

    public function update(PropertyRequest $request, PropertyService $service, $id)
    {
    	$data = $request->only('name','key');
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(PropertyService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->deleteData($service, $entity);
    }

}
