<?php

namespace App\Repositories\Contracts;

interface CategoryRepository extends AbstractRepository
{
	public function getDataWithType($type, $locale = 'vi', $columns = ['*']);

	public function getRootWithType($type, $locale = 'vi', $columns = ['*']);

	public function findBySlug($slug);

	public function getFirstWithType($type, $locale = 'vi', $columns = ['*']);
}
