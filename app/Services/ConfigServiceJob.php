<?php

namespace App\Services;

use App\Services\Contracts\ConfigService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Config\Store;

class ConfigServiceJob extends AbstractServiceJob implements ConfigService
{
	public function store(array $attributes)
	{
		return $this->dispatch(new Store($attributes));
	}

	public function update(Model $entity, array $attributes)
	{
	}

	public function delete(Model $entity)
	{
	}

	public function destroy(array $ids)
	{
	}
}
