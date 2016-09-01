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

	protected $dataSelect = ['id','name','parent_id','order','src', 'locale'];

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
    	$this->compacts['categoryPost'] = $this->categoryRepository->getDataWithType('post', $this->locale, $this->dataCategory)->lists('name','id');
        $this->compacts['categoryProduct'] = $this->categoryRepository->getDataWithType('product', $this->locale, $this->dataCategory)->lists('name','id');
    	$this->compacts['categoryAccessary'] = $this->categoryRepository->getDataWithType('accessary', $this->locale, $this->dataCategory)->lists('name','id');
    	$this->compacts['pages'] = $this->pageRepository->getByLocale($this->locale, $this->dataCategory)->lists('name','id');
    	$this->compacts['items'] = $this->repository->getRoot($this->locale, $this->dataSelect);
    	return $this->viewRender();
    }

    public function store(MenuRequest $request, MenuService $service)
    {
    	$data = $request->only('value','type');
        $data['locale'] = $this->locale;
    	$service->store($data);

    	return $this->repository->getRoot($this->locale, $this->dataSelect);
    }

    public function serialize(MenuRequest $request, MenuService $service)
    {
    	$data = $request->only('serialize');
    	try {
    		$service->serialize($data);
            $this->e['message'] = $this->trans('object_updated_successfully');
            \Cache::forget('__menus');
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
