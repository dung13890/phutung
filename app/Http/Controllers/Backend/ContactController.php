<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\Contracts\ContactRepository;
use App\Services\Contracts\ContactService;

class ContactController extends BackendController
{
	protected $dataSelect = ['id','topic','name', 'phone', 'address', 'email','created_at'];

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

    public function destroy($id)
    {
        $entity = $this->repository->find($id);
        try {
            $entity->delete($entity);
            $this->e['message'] = $this->trans('object_deleted_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('object_deleted_unsuccessfully');
        }
        if (\Request::ajax() || \Request::wantsJson()) {
            return session()->flash('flash_message', json_encode($this->e, true));
        }
        
        return redirect($redirect)->with('flash_message',json_encode($this->e, true));
    }
}
