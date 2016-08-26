<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\MenuRequest;
use App\Repositories\Contracts\MenuRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\PageRepository;
use App\Services\Contracts\MenuService;

class MenuController extends BackendController
{
	protected $categoryRepository;

	protected $pageRepository;

	protected $dataSelect = ['id','name','parent_id','order','src'];

	protected $dataCategory = ['id', 'name'];

	protected $dataPage = ['id', 'name'];

    public function __construct(MenuRepository $menu, CategoryRepository $category, PageRepository $page)
    {
        parent::__construct($menu);
        $this->categoryRepository = $category;
        $this->pageRepository = $page;
    }

    public function index()
    {
    	$this->before(__FUNCTION__);
    	parent::index();
    	$this->compacts['action'] = 'Order sort';
    	$this->compacts['categoryPost'] = $this->categoryRepository->getDataWithType('post',$this->dataCategory)->lists('name','id');
    	$this->compacts['categoryProduct'] = $this->categoryRepository->getDataWithType('product',$this->dataCategory)->lists('name','id');
    	$this->compacts['pages'] = $this->pageRepository->all($this->dataCategory)->lists('name','id');
    	$this->compacts['items'] = $this->repository->getRoot($this->dataSelect);
    	return $this->viewRender();
    }

    public function store(MenuRequest $request, MenuService $service)
    {
    	$data = $request->only('value','type');
    	$service->store($data);

    	return $this->repository->getRoot($this->dataSelect);
    }

    public function serialize(MenuRequest $request, MenuService $service)
    {
    	$data = $request->only('serialize');
    	try {
    		$service->serialize($data);
            $this->e['message'] = $this->trans('object_updated_successfully');
    	} catch (\Exception $e) {
    		$this->e['code'] = 100;
    		$this->e['message'] = $this->trans('object_updated_unsuccessfully');
    	}
    	
        return session()->flash('flash_message', json_encode($this->e, true));

    }

    public function update(MenuRequest $request, MenuService $service, $id)
    {
    	$data = $request->only('name','src');
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(MenuService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->deleteData($service, $entity);
    }
}
