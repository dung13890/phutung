<?php

namespace App\Services;

use App\Services\Contracts\ContactService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Contact\Store;
use App\Jobs\Contact\Update;
use App\Jobs\Contact\Delete;
use App\Jobs\Contact\Destroy;

class ContactServiceJob extends AbstractServiceJob implements ContactService
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
