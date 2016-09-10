<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\PageRepository;

class PageController extends FrontendController
{
	protected $dataSelect = ['id', 'name', 'slug'];

    public function __construct(PageRepository $page)
    {
        parent::__construct($page);
    }

    public function show($slug)
    {
    	$this->compacts['item'] = $this->repository->findBySlug($slug);
    	$this->compacts['heading'] = $this->compacts['item']->name;

        if ($this->compacts['item']->seo) {
            $this->compacts['description'] = $this->compacts['item']->seo->description;
            $this->compacts['keywords'] = $this->compacts['item']->seo->keywords;
        }

        $this->compacts['pages'] = $this->repository->getActivedByLocale($this->locale, $this->dataSelect);
        $this->view = 'page.show';

        return $this->viewRender();
    }
}
