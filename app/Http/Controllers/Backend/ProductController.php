<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\PropertyRepository;
use App\Services\Contracts\ProductService;

class ProductController extends BackendController
{
    protected $dataSelect = ['id','name','price','image','locked','sale','price_sale'];

    protected $dataCategory = ['id', 'name', 'parent_id'];

    protected $dataProperty = ['id', 'key', 'name'];

    protected $categoryRepository;

    protected $propertyRepository;

    protected $typeCategory = 'product';

    public function __construct(ProductRepository $product, CategoryRepository $category, PropertyRepository $property)
    {
        parent::__construct($product);
        $this->categoryRepository = $category;
        $this->propertyRepository = $property;
    }

    public function getData($items = null)
    {
        //$this->before('index');
        return \Datatables::of($items ? $items : $this->repository->datatables($this->dataSelect))
        ->editColumn('image', function ($item) {
            return $item->image_thumbnail;
        })
        ->editColumn('price', function ($item) {
        	return number_format( ($item->sale) ?  $item->price_sale : $item->price);
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
        $items = $category->products()->get($this->dataSelect);

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
        $this->compacts['groupProperty'] = $this->propertyRepository->all($this->dataProperty)->groupBy('key');

        return $this->viewRender();
    }

    public function store(ProductRequest $request, ProductService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->all();
        
        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($this->typeCategory, $this->dataCategory);
        $this->compacts['groupProperty'] = $this->propertyRepository->all($this->dataProperty)->groupBy('key');
        $this->compacts['tags'] = $this->compacts['item']->tags->lists('name','name')->all();
        $this->compacts['item']->load('images');

        return $this->viewRender();
    }

    public function update(ProductRequest $request, ProductService $service, $id)
    {
    	$data = $request->all();
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(ProductService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->deleteData($service, $entity);
    }

    public function getTags()
    {
        return $this->repository->allTags(9);
    }
}
