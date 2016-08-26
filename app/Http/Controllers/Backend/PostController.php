<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\PostRequest;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\PostService;

class PostController extends BackendController
{
    protected $dataSelect = ['id','name','intro','user_id','image','created_at','locked'];

    protected $dataCategory = ['id', 'name', 'parent_id'];

    protected $categoryRepository;

    protected $typeCategory = 'post';

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($post);
        $this->categoryRepository = $category;
    }

    public function getData($items = null)
    {
        //$this->before('index');
        return \Datatables::of($items ? $items : $this->repository->datatables($this->dataSelect))
        ->editColumn('image', function ($item) {
            return $item->image_thumbnail;
        })
        ->addColumn('actions', function ($item) {
            $actions = [];
                if ($this->before('show', $item, false)) {
                    $actions['show'] = [
                        'uri' => route($this->viewPrefix.$this->repositoryName.'.show', $item->id),
                        'label' => $this->trans('show'),
                    ];
                }
                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = [
                        'uri' => route($this->viewPrefix.$this->repositoryName.'.edit', $item->id),
                        'label' => $this->trans('edit'),
                    ];
                }
                if ($this->before('delete',$item, false)) {
                    $actions['delete'] = [
                        'uri' => route($this->viewPrefix.$this->repositoryName.'.destroy', $item->id),
                        'label' => $this->trans('delete'),
                    ];
                }

            return $actions;
        })->make(true);
    }

    public function getDataWithCategory($category)
    {
        $this->before('index');
        $category = $this->categoryRepository->findOrFail($category);
        $items = $category->posts()->get($this->dataSelect);

        return $this->getData($items);
    }

    public function index()
    {
        $this->before(__FUNCTION__);
        parent::index();
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($this->typeCategory, $this->dataCategory);
        
        return $this->viewRender();
    }

    public function category($category)
    {
        $this->before('index');
        $this->compacts['category'] = $this->categoryRepository->findOrFail($category);
        
        return $this->index();
    }

    public function create()
    {
        $this->before(__FUNCTION__);
        parent::create();
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($this->typeCategory, $this->dataCategory);
        
        return $this->viewRender();
    }

    public function store(PostRequest $request, PostService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->all();
        
        return $this->storeData($data, $service);
    }

    public function getTags()
    {
        return $this->repository->allTags(9);
    }

    public function edit($id)
    {
        parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($this->typeCategory, $this->dataCategory);
        $this->compacts['tags'] = $this->compacts['item']->tags->lists('name','name')->all();

        return $this->viewRender();
    }

    public function update(PostRequest $request, PostService $service, $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(PostService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }
}
