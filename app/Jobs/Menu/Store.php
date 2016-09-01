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
                if (isset($this->attributes['locale'])) {
                    $this->attributes['value'][0]['locale'] = $this->attributes['locale'];
                }
                $repository->create($this->attributes['value'][0]);
                break;
            case 'page':
                $this->type($pageRepository, $this->attributes['value'], $this->attributes['locale']);
                break;
            case 'post':
            case 'accessary':
            case 'product':
                $this->type($categoryRepository, $this->attributes['value'], $this->attributes['locale']);
                break;
        }
    }

    public function type(AbstractRepository $repository, array $data, $locale = 'vi')
    {
        foreach ($data as $value) {
            $type = $repository->findOrFail($value['id']);
            $typeName = strtolower(class_basename($type));
            $menu = app(MenuRepository::class)->create([
                'name' => $value['name'],
                'src' => parse_url(route("{$typeName}.show",$type->slug), PHP_URL_PATH),
                'locale' => $locale
            ]);
            $type->menus()->save($menu);
        }
    }
}
