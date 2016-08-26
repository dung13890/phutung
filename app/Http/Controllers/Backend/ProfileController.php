<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProfileRequest;
use App\Repositories\Contracts\UserRepository;
use App\Services\Contracts\UserService;
use Spatie\Activitylog\Models\Activity;

class ProfileController extends BackendController
{
    protected $dataLog = ['id','text','created_at'];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function getLog()
    {
    	$items = Activity::where('user_id',$this->user->id)->latest()->limit(100)->get($this->dataLog);
    	return $this->getData($items);
    }

    public function userShow()
    {
    	$this->view = 'profile.show';
    	$this->compacts['item'] = $this->user;
        $this->compacts['heading'] = $this->trans('profile');
        $this->compacts['resource'] = 'profile';
        return $this->viewRender();
    }

    public function userUpdate(ProfileRequest $request, UserService $service)
    {
    	$data = $request->all();
    	$entity = $this->user;
    	return $this->updateData($data, $service, $entity,route($this->viewPrefix.'profile'));
    }
}
