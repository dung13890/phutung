<?php

namespace App\Repositories\Contracts;

interface PageRepository extends AbstractRepository
{
	public function allTags($paginate = 9);

	public function findBySlug($slug);

	public function getByLocale($locale, $columns = ['*']);

	public function getPage($limit, $locale = 'vi', $columns = ['*']);
}
