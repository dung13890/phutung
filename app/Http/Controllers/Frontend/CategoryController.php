<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\CategoryRepository;

class CategoryController extends FrontendController
{
    protected $dataSelect = ['id', 'slug','name', 'type', 'description'];

    protected $dataPost = ['id', 'slug', 'name', 'image', 'created_at', 'intro'];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function show($slug)
    {
    	$this->compacts['item'] = $this->repository->findBySlug($slug);
    	$this->compacts['heading'] = $this->compacts['item']->name;
    	$this->compacts['description'] = $this->compacts['item']->description;
    	$this->compacts['banner'] = $this->compacts['item']->banner;
    	$this->compacts['categories'] = $this->repository->getRootWithType($this->compacts['item']->type, $this->dataSelect);
    	
    	switch ($this->compacts['item']->type) {
    		case 'post':
    			$this->compacts['posts'] = $this->compacts['item']->posts()->paginate(12, $this->dataPost);
    			$this->view = 'post.category';
    			break;
    		case 'product':
    			$this->compacts['products'] = $this->compacts['item']->products;
    			$this->view = 'product.category';
    			break;
    		
    	}
    	
    	return $this->viewRender();
    }
}
