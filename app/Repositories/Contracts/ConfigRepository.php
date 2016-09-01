<?php

namespace App\Repositories\Contracts;

interface ConfigRepository extends AbstractRepository
{
	public function findByKey($key, $locale = 'vi');
	
	public function getByLocale($locale, $columns = ['*']);
}
