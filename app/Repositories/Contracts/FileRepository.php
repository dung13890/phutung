<?php

namespace App\Repositories\Contracts;

interface FileRepository extends AbstractRepository
{
	public function getFile($limit, $columns = ['*']);
}
