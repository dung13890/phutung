<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\CategoryRepository;

class PostController extends FrontendController
{
    protected $dataSelect = ['id', 'name', 'slug', 'description', 'intro', 'image'];

    protected $dataCategory = ['id', 'slug','name', 'type', 'description'];

    protected $categoryRepository;

    public function __construct(PostRepository $post, CategoryRepository $category)
    {
        parent::__construct($post);
        $this->categoryRepository = $category;
    }

    public function show($slug)
    {
    	$this->compacts['item'] = $this->repository->findBySlug($slug);
        $this->compacts['heading'] = $this->compacts['item']->name;

        if ($this->compacts['item']->seo) {
            $this->compacts['description'] = $this->compacts['item']->seo->description;
            $this->compacts['keywords'] = $this->compacts['item']->seo->keywords;
        }

        $this->compacts['category'] = $this->compacts['item']->categories->last();
        $this->compacts['banner'] = $this->compacts['category']->banner;
        $this->compacts['categories'] = $this->categoryRepository->getRootWithType('post', $this->locale, $this->dataCategory);

        $this->view = 'post.show';

        return $this->viewRender();
    }
}
