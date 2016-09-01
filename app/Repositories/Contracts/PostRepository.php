<?php

namespace App\Repositories\Contracts;

interface PostRepository extends AbstractRepository
{
	public function allTags($paginate = 9);

	public function getHome($limit, $locale = 'vi', $columns = ['*']);

	public function findBySlug($slug);
}
