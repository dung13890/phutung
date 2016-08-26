<?php

namespace App\Services;

use App\Services\Contracts\SlideService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Slide\Store;
use App\Jobs\Slide\Update;
use App\Jobs\Slide\Delete;
use App\Jobs\Slide\Destroy;

class SlideServiceJob extends AbstractServiceJob implements SlideService
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
