<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\ContactRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\PositionRepository;
use App\Repositories\Contracts\FileRepository;
use App\Http\Requests\Frontend\ContactRequest;

class HomeController extends FrontendController
{
    protected $dataSelect = ['id', 'name', 'slug', 'intro', 'image', 'created_at'];

    protected $postRepository;

    protected $contactRepository;

    protected $categoryRepository;

    protected $productRepository;

    protected $fileRepository;

    public function __construct (
        PostRepository $post,
        ContactRepository $contact,
        CategoryRepository $category,
        PositionRepository $position,
        ProductRepository $product,
        FileRepository $file
        )
    {
        parent::__construct();

        $this->postRepository = $post;
        $this->contactRepository = $contact;
        $this->categoryRepository = $category;
        $this->positionRepository = $position;
        $this->productRepository = $product;
        $this->fileRepository = $file;
    }

    public function index()
    {
    	$this->compacts['posts'] = $this->postRepository->getHome(5, $this->locale, $this->dataSelect);
        $this->compacts['postCategory'] = $this->categoryRepository->getFirstWithType('post', $this->locale);
        $this->compacts['heading'] = $this->trans('home');
    	$this->view = 'home.index';

    	return $this->viewRender();
    }

    public function search(Request $request)
    {
        $this->compacts['value'] = $request->search;
        $this->compacts['products'] = $this->productRepository->search($this->compacts['value'], $this->locale);
        $this->view = 'home.search';

        return $this->viewRender();
    }

    public function getListFile()
    {
        $this->compacts['items'] = $this->fileRepository->paginate(10);
        $this->compacts['items']->load('category');
        $this->view = 'home.file';

        return $this->viewRender();
    }

    public function contact()
    {
        $this->compacts['heading'] = 'Liên hệ';
        $this->compacts['positions'] = $this->positionRepository->getPosition(5);
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

    public function locale($locale)
    {
        session()->put('locale', $locale);
        \Cache::forget('__menus');
        \Cache::forget('configs');

        return redirect(route('home.index'));
    }
}
