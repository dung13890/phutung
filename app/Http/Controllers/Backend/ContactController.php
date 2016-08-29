<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Contracts\ContactRepository;
use App\Services\Contracts\ContactService;

class ContactController extends BackendController
{
	protected $dataSelect = ['id','topic','name', 'phone', 'email','created_at'];

	public function __construct(ContactRepository $contact)
    {
        parent::__construct($contact);
    }

    public function index()
    {
        parent::index();
        
        return $this->viewRender();
    }

    public function show($id)
    {
    	parent::show($id);

    	return $this->viewRender();
    }
}
