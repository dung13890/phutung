<?php

namespace App\Http\Controllers\Frontend;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\ContactRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Http\Requests\Frontend\ContactRequest;

class HomeController extends FrontendController
{
    protected $dataSelect = ['id', 'name', 'slug', 'intro', 'image', 'created_at'];

    protected $postRepository;

    protected $contactRepository;

    protected $categoryRepository;

    public function __construct(PostRepository $post, ContactRepository $contact, CategoryRepository $category)
    {
        parent::__construct();

        $this->postRepository = $post;
        $this->contactRepository = $contact;
        $this->categoryRepository = $category;
    }

    public function index()
    {
    	$this->compacts['posts'] = $this->postRepository->getHome(5, $this->dataSelect);
        $this->compacts['postCategory'] = $this->categoryRepository->getFirstWithType('post');
        $this->compacts['heading'] = 'Trang chủ';
    	$this->view = 'home.index';

    	return $this->viewRender();
    }

    public function contact()
    {
        $this->compacts['heading'] = 'Liên hệ';
        $this->view = 'home.contact';

        return $this->viewRender();
    }

    public function postContact(ContactRequest $request)
    {
        $data = $request->all();
        try {
            $this->contactRepository->create($data);
            $this->e['message'] = $this->trans('created_contact_unsuccessfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('created_contact_unsuccessfully');
        }

        return redirect(url()->previous())->with('flash_message_frontend',json_encode($this->e, true));
    }
}
