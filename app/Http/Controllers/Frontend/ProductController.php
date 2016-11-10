<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\CategoryRepository;

class ProductController extends FrontendController
{
    protected $dataSelect = ['id', 'name', 'slug', 'description', 'price', 'image'];

    protected $dataCategory = ['id', 'slug','name', 'type', 'description'];

    protected $categoryRepository;

    public function __construct(ProductRepository $product, CategoryRepository $category)
    {
        parent::__construct($product);
        $this->categoryRepository = $category;
    }

    public function show($slug)
    {
    	$this->compacts['item'] = $this->repository->findBySlug($slug);

        $this->compacts['heading'] = $this->compacts['item']->name;

        if ($this->compacts['item']->seo) {
            $this->compacts['description'] = $this->compacts['item']->seo->description;
            $this->compacts['keywords'] = $this->compacts['item']->seo->keywords;
            $this->compacts['image_social'] = route('image', $this->compacts['item']->image_small);
        }

        $this->compacts['category'] = $this->compacts['item']->categories()->first();
        $this->compacts['banner'] = $this->compacts['category']->banner;
        $this->compacts['categories'] = $this->categoryRepository->getRootWithType($this->compacts['item']->type, $this->locale, $this->dataCategory)->slice(1);
        $this->compacts['randomProducts'] = $this->compacts['category']->randomProducts;

        $this->view = 'product.show';

        return $this->viewRender();
    }
}
