<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ConfigRequest;
use App\Repositories\Contracts\ConfigRepository;
use App\Services\Contracts\ConfigService;

class ConfigController extends BackendController
{
    public function __construct(ConfigRepository $config)
    {
        parent::__construct($config);
    }

    public function index()
    {
    	parent::index();
    	$data['items'] = $this->repository->all();
    	
    	return $this->viewRender($data, $this->repositoryName.'.create');
    }

    public function store(ConfigRequest $request, ConfigService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->only('name','keywords','description','facebook','youtube',
        	'email','phone','address','scripts','logo','slogan','introduce', 'box_left_image', 'box_left_name', 'box_left_link',
            'box_right_image', 'box_right_name', 'box_right_link');

        if (!$data['logo'] || !isset($data['logo'])) {
            unset($data['logo']);
        }
        if (!$data['box_left_image'] || !isset($data['box_left_image'])) {
            unset($data['box_left_image']);
        }
        if (!$data['box_right_image'] || !isset($data['box_right_image'])) {
            unset($data['box_right_image']);
        }
        \Cache::flush();
        
        return $this->storeData($data, $service);
    }
}
