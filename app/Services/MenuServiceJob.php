<?php

namespace App\Services;

use App\Services\Contracts\MenuService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Menu\Store;
use App\Jobs\Menu\Update;
use App\Jobs\Menu\Delete;
use App\Jobs\Menu\Destroy;
use App\Jobs\Menu\Serialize;

class MenuServiceJob extends AbstractServiceJob implements MenuService
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

	public function serialize(array $attributes)
	{
		return $this->dispatch(new Serialize($attributes));
	}
}
