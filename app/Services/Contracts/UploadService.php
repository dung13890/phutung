<?php

namespace App\Services\Contracts;

interface UploadService extends AbstractService
{
	public function getReponseImage($path, $params);
}
