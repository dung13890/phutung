<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\CategoryRepository;

class CategoryController extends FrontendController
{
    protected $dataSelect = ['id', 'slug','name', 'type', 'description'];

    protected $dataPost = ['id', 'slug', 'name', 'image', 'created_at', 'intro', 'description'];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function show($slug)
    {
    	$this->compacts['item'] = $this->repository->findBySlug($slug);
    	$this->compacts['heading'] = $this->compacts['item']->name;
    	$this->compacts['description'] = str_limit(strip_tags($this->compacts['item']->description), 156);
    	$this->compacts['banner'] = $this->compacts['item']->banner;
        if (isset($this->compacts['banner'])) {
            $this->compacts['image_social'] = route('image', $this->compacts['banner']->image_default);
        }
    	$this->compacts['categories'] = $this->repository->getRootWithType($this->compacts['item']->type, $this->locale, $this->dataSelect);

    	switch ($this->compacts['item']->type) {
    		case 'post':
    			$this->compacts['posts'] = $this->compacts['item']->posts()->paginate(5, $this->dataPost);
    			$this->view = 'post.category';
    			break;
    		case 'product':
                $this->compacts['products'] = $this->compacts['item']->products()->with('provider')->paginate(6);
                $this->compacts['files'] = $this->compacts['item']->files()->where('locked', false)->take(5)->get();
                $this->view = 'product.product';
                break;
            case 'accessary':
                $this->compacts['categories']->load('banner');
                $this->compacts['banner'] = $this->compacts['categories']->first()->banner;
    			$this->compacts['products'] = $this->compacts['item']->products()->with('provider')->paginate(3);
                $this->compacts['files'] = $this->compacts['item']->files()->where('locked', false)->take(5)->get();
    			$this->view = 'product.accessary';
    			break;
    	}

    	return $this->viewRender();
    }
}
