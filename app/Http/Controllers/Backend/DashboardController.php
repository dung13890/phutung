<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use App\Services\Contracts\UploadService;
use App\Eloquent\Notification;

class DashboardController extends BackendController
{
    public function index()
    {
    	$this->view = 'dashboard.index';
        $this->compacts['heading'] = $this->trans('dashboard');

        return $this->viewRender();
    }

    public function summernoteImage(Request $request, UploadService $service)
    {
        $path = $service->summernote($request->all());

        return [
            'url' => route('image', app()['glide.builder']->getUrl($path))
        ];
    }

    public function getReponseImage(Request $request, UploadService $service, $path)
    {
    	$params = $request->all();

    	return $service->getReponseImage($path, $params);
    }

    public function getReponseFile($path)
    {
        $file = \Storage::disk('file')->get($path);
        $destinationPath = \Storage::disk('file')->getDriver()->getAdapter()->getPathPrefix() . $path;
        $ext = pathinfo($destinationPath, PATHINFO_EXTENSION);

        return \Response::make($file, 200, array('Content-Type' => $ext));
    }

    public function readNotification($id)
    {
        app(Notification::class)->findOrFail($id)->update(['read' => true]);
    }

    public function locale($locale)
    {
        session()->forget('locale');
        
        session()->put('locale', $locale);
        \Cache::flush();
        
        return redirect(url()->previous());
    }
}
