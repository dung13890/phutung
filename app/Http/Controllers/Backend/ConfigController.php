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
    	$data['items'] = $this->repository->getByLocale($this->locale);
    	return $this->viewRender($data, $this->repositoryName.'.create');
    }

    public function store(ConfigRequest $request, ConfigService $service)
    {
    	$this->before(__FUNCTION__);
        $data = $request->only('name','keywords','description','facebook','youtube',
        	'email','phone','address','scripts','logo_header', 'logo_footer', 'slogan',
            'introduce', 'box_left_name', 'box_left_link', 'box_right_name', 'box_right_link',
            'box_left_image', 'box_right_image'
        );

        if (!$data['logo_header'] || !isset($data['logo_header'])) {
            unset($data['logo_header']);
        }
        if (!$data['logo_footer'] || !isset($data['logo_footer'])) {
            unset($data['logo_footer']);
        }
        if (!$data['box_left_image'] || !isset($data['box_left_image'])) {
            unset($data['box_left_image']);
        }
        if (!$data['box_right_image'] || !isset($data['box_right_image'])) {
            unset($data['box_right_image']);
        }
        $data['locale'] = $this->locale;
        \Cache::flush();

        return $this->storeData($data, $service);
    }
}
