<?php

namespace App\Services\Contracts;
use Illuminate\Database\Eloquent\Model;

interface CategoryService extends AbstractService
{
	public function storeDesign(Model $entity, array $attributes);
}
