<?php

namespace App\Services;

use App\Services\Contracts\PositionService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Position\Store;
use App\Jobs\Position\Update;
use App\Jobs\Position\Delete;
use App\Jobs\Position\Destroy;

class PositionServiceJob extends AbstractServiceJob implements PositionService
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
