<?php

namespace App\Repositories\Contracts;

interface PositionRepository extends AbstractRepository
{
	public function getPosition($limit, $columns = ['*']);
}
