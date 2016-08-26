<?php

namespace App\Services;

use App\Services\Contracts\PropertyService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Property\Store;
use App\Jobs\Property\Update;
use App\Jobs\Property\Delete;
use App\Jobs\Property\Destroy;

class PropertyServiceJob extends AbstractServiceJob implements PropertyService
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
