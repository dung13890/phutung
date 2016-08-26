<?php

namespace App\Repositories\Contracts;

interface PostRepository extends AbstractRepository
{
	public function allTags($paginate = 9);

	public function featured();

	public function findBySlug($slug);
}
