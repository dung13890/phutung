<?php

namespace App\Repositories\Contracts;

interface ProductRepository extends AbstractRepository
{
	public function getDataWithType($type, $locale = 'vi', $columns = ['*']);

	public function allTags($paginate = 9);

	public function featured($limit, $columns = ['*']);

	public function findBySlug($slug);

	public function random($limit, $columns = ['*']);

	public function search($value, $locale = 'vi', $paginate = 16, $columns = ['*']);

    public function getFeatured($type, $locale = 'vi');
}
