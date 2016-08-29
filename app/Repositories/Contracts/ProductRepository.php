<?php

namespace App\Repositories\Contracts;

interface ProductRepository extends AbstractRepository
{
	public function getDataWithType($type, $columns = ['*']);

	public function allTags($paginate = 9);

	public function featured($limit, $columns = ['*']);

	public function findBySlug($slug);

	public function random($limit, $columns = ['*']);
}
