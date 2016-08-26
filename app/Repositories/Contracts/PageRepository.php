<?php

namespace App\Repositories\Contracts;

interface PageRepository extends AbstractRepository
{
	public function allTags($paginate = 9);
}
