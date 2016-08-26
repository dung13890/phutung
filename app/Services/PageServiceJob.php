<?php

namespace App\Services;

use App\Services\Contracts\PageService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Page\Store;
use App\Jobs\Page\Update;
use App\Jobs\Page\Delete;
use App\Jobs\Page\Destroy;

class PageServiceJob extends AbstractServiceJob implements PageService
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
