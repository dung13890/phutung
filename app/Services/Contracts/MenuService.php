<?php

namespace App\Services\Contracts;

interface MenuService extends AbstractService
{
	public function serialize(array $attributes);
}
