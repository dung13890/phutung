<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\SlideRepository;

class HomeController extends FrontendController
{
    public function index()
    {
    	//$this->compacts['sliders'] = app(SlideRepository::class)->getHome(5);
    	$this->compacts['heading'] = 'Trang chủ';
    	$this->view = 'home.index';
    	return $this->viewRender();
    }

    public function test()
    {
    	$this->compacts['heading'] = 'Trang chủ';
    	$this->view = 'home.index';
    	return $this->viewRender();
    }
}
