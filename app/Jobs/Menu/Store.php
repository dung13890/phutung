<?php

namespace App\Jobs\Menu;

use App\Jobs\Job;
use App\Repositories\Contracts\MenuRepository;
use App\Repositories\Contracts\PageRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\AbstractRepository;

class Store extends Job
{
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public function handle(MenuRepository $repository, CategoryRepository $categoryRepository, PageRepository $pageRepository)
    {
        switch ($this->attributes['type']) {
            case 'link':
                $repository->create($this->attributes['value'][0]);
                break;
            case 'page':
                $this->type($pageRepository, $this->attributes['value']);
                break;
            case 'post':
            case 'product':
                $this->type($categoryRepository, $this->attributes['value']);
                break;
        }
    }

    public function type(AbstractRepository $repository, array $data)
    {
        foreach ($data as $value) {
            $type = $repository->findOrFail($value['id']);
            $typeName = strtolower(class_basename($type));
            $menu = app(MenuRepository::class)->create([
                'name' => $value['name'],
                'src' => parse_url(route("{$typeName}.slug",$type->slug), PHP_URL_PATH)
            ]);
            $type->menus()->save($menu);
        }
    }
}
