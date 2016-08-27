<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\PostRepository;

class HomeController extends FrontendController
{
    protected $dataSelect = ['id', 'name', 'slug', 'intro', 'image', 'created_at'];

    protected $postRepository;

    public function __construct(PostRepository $post)
    {
        parent::__construct();

        $this->postRepository = $post;
    }

    public function index()
    {
    	$this->compacts['posts'] = $this->postRepository->getHome(5, $this->dataSelect);
        $this->compacts['heading'] = 'Trang chủ';
    	$this->view = 'home.index';

    	return $this->viewRender();
    }
}
