<?php

namespace App\Services;

use App\Services\Contracts\UploadService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Upload\Store;
use App\Jobs\Upload\Update;
use App\Jobs\Upload\Delete;
use App\Jobs\Upload\Destroy;
use App\Jobs\Upload\Summernote;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Urls\UrlBuilderFactory;

class UploadServiceJob extends AbstractServiceJob implements UploadService
{
	public function store(array $attributes)
	{
		return $this->dispatch(new Store($attributes));
	}

	public function update(Model $entity, array $attributes)
	{
		return $this->dispatch(new Update($entity, $attributes));
	}

	public function delete(Model $entity)
	{
	}

	public function destroy(array $ids)
	{
	}

	public function summernote(array $attributes)
	{
		return $this->dispatch(new Summernote($attributes));
	}

	public function getReponseImage($path, $params)
	{
		$server = app()['glide'];
		try {
            SignatureFactory::create(env('GLIDE_SIGNKEY'))->validateRequest($path, $params);
            return $server->getImageResponse($path, $params);
        } catch (SignatureException $e) {
            //abort(403, $e->getMessage());
            return redirect(asset('assets/img/backend/no_image.jpg'));
        }
	}
}
