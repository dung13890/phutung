<?php

namespace App\Services;

use App\Services\Contracts\FileService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\File\Store;
use App\Jobs\File\Update;
use App\Jobs\File\Delete;
use App\Jobs\File\Destroy;

class FileServiceJob extends AbstractServiceJob implements FileService
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
		return $this->dispatch(new Delete($entity));
	}

	public function destroy(array $ids)
	{
		return $this->dispatch(new Destroy($ids));
	}
}
