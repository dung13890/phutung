<?php

namespace App\Repositories\Contracts;

interface SlideRepository extends AbstractRepository
{
	public function getSlide($limit, $columns = ['*']);
}
