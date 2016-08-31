<?php

namespace App\Services;

use App\Services\Contracts\ProviderService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Provider\Store;
use App\Jobs\Provider\Update;
use App\Jobs\Provider\Delete;
use App\Jobs\Provider\Destroy;

class ProviderServiceJob extends AbstractServiceJob implements ProviderService
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
