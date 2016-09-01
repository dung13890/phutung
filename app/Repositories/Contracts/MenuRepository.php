<?php

namespace App\Repositories\Contracts;

interface MenuRepository extends AbstractRepository
{
	public function getRoot($locale = 'vi', $columns = ['*']);
}
