<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\PropertyRepository;
use App\Repositories\Contracts\ProviderRepository;
use App\Services\Contracts\ProductService;

class ProductController extends BackendController
{
    protected $dataSelect = ['id', 'name', 'price', 'image', 'locked'];

    protected $dataCategory = ['id', 'name', 'parent_id'];

    protected $dataProperty = ['id', 'key', 'name'];

    protected $dataProvider = ['id', 'name'];

    protected $categoryRepository;

    protected $propertyRepository;

    protected $providerRepository;

    public function __construct(ProductRepository $product, CategoryRepository $category, PropertyRepository $property, ProviderRepository $provider)
    {
        parent::__construct($product);
        $this->categoryRepository = $category;
        $this->propertyRepository = $property;
        $this->providerRepository = $provider;
    }

    public function getDataWithType($type)
    {
        $this->before('index');
        $items = $this->repository->getDataWithType($type, $this->dataSelect);

        return $this->getData($items);
    }

    public function getDataWithCategory($category)
    {
        $this->before('index');
        $category = $this->categoryRepository->findOrFail($category);
        $items = $category->products()->get($this->dataSelect);

        return $this->getData($items);
    }

    public function type($type)
    {
        $this->before('index');
        if (!in_array($type, config('developer.typeProduct'))) {
            abort(403);
        }
        $this->view = $this->repositoryName.'.index';
        $this->compacts['resource'] = 'product';
        $this->compacts['heading'] = ucfirst($this->trans($type));
        $this->compacts['type'] = $type;
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($type, $this->dataCategory);

        return $this->viewRender();
    }

    public function category($category)
    {
        $this->before('index');
        $this->compacts['category'] = $this->categoryRepository->findOrFail($category);
        
        return $this->type($this->compacts['category']->type);
    }

    public function createWithType($type)
    {
        $this->before(__FUNCTION__);
        if (!in_array($type, config('developer.typeProduct'))) {
            abort(403);
        }
        $this->view = $this->repositoryName.'.create';
        $this->compacts['heading'] = 'Thêm ' . $this->trans($type);
        $this->compacts['resource'] = $this->repositoryName;
        $this->compacts['type'] = $type;
        $this->compacts['listGuarantee'] = config('developer.guarantee');
        $this->compacts['listProvider'] = $this->providerRepository->all($this->dataProvider)->lists('name','id')->prepend('Chọn','0');
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($type, $this->dataCategory);
        $this->compacts['groupProperty'] = $this->propertyRepository->all($this->dataProperty)->groupBy('key');
        
        return $this->viewRender();
    }

    public function store(ProductRequest $request, ProductService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->all();
        
        return $this->storeData($data, $service, route('backend.product.type', $request->type));
    }

    public function edit($id)
    {
    	parent::edit($id);
        $this->before(__FUNCTION__, $this->compacts['item']);
        $this->compacts['type'] = $this->compacts['item']->type;
        $this->compacts['listGuarantee'] = config('developer.guarantee');
        $this->compacts['listProvider'] = $this->providerRepository->all($this->dataProvider)->lists('name','id')->prepend('Chọn','0');
        $this->compacts['rootCategories'] = $this->categoryRepository->getRootWithType($this->compacts['type'], $this->dataCategory);
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

        return $this->updateData($data, $service, $entity, route('backend.product.type', $entity->type));
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
