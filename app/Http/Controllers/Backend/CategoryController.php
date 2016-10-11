<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Requests\Backend\DesignRequest;
use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\CategoryService;

class CategoryController extends BackendController
{
    protected $dataSelect = ['id','name','type','parent_id','locked'];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function index()
    {
    	return abort(403);
    }

    public function dataRender($type, $action = 'create')
    {
        if (!in_array($type, config('developer.categories'))) {
            abort(403);
        }

        $this->view = $this->repositoryName.'.index';
        $this->compacts['heading'] = $this->trans('category') . ' ' . $this->trans($type);
        $this->compacts['action'] = ucfirst($this->trans($action));

        $this->compacts['items'] = $this->repository->getRootWithType($type, $this->locale, $this->dataSelect);
        $this->compacts['listItems'] = (!isset($this->compacts['item'])) ? 
            $this->compacts['items']->lists('name','id')->prepend('Root',0) :
            $this->compacts['items']->lists('name','id')->forget($this->compacts['item']->id)->prepend('Root',0);
        if (isset($this->compacts['item'])) {
            $this->compacts['banner'] = $this->compacts['item']->banner;
        }

        return $this->viewRender();
    }

    public function withType($type)
    {
        $this->before('index');
        $this->compacts['type'] = $type;

        return $this->dataRender($type);
    }

    public function store(CategoryRequest $request, CategoryService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->all();
        $data['locale'] = $this->locale;

        return $this->storeData($data, $service, url()->previous());
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);

        if ($id == 2 || $id == 5) {
            $this->compacts['designs'] = $this->compacts['item']->designs;
        }

        return $this->dataRender($this->compacts['item']->type, 'edit');
    }

    public function update(CategoryRequest $request, CategoryService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->updateData($data, $service, $entity, route($this->viewPrefix.'category.type',$entity->type));
    }

    public function destroy(CategoryService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->deleteData($service, $entity);
    }

    public function storeDesign(DesignRequest $request, CategoryService $service, $id)
    {
        if ($id != 2 && $id !=5) {
            return;
        }

        $entity = $this->repository->findOrFail($id);
        $data = $request->all();

        try {
            $service->storeDesign($entity, $data);
            $this->e['message'] = $this->trans('created_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('created_unsuccessfully');
        }

        return redirect(url()->previous())->with('flash_message',json_encode($this->e, true));
    }

    public function deleteDesign($id)
    {
        try {
            app(\App\Eloquent\Design::class)->destroy($id);
            $this->e['message'] = $this->trans('deleted_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('deleted_unsuccessfully');
        }

        if (\Request::ajax() || \Request::wantsJson()) {
            return session()->flash('flash_message', json_encode($this->e, true));
        }
    }
}
