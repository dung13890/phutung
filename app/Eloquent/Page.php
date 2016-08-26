<?php

namespace App\Eloquent;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;

class Page extends Abstracts\Sluggable implements TaggableInterface
{
    use TaggableTrait;

    protected $fillable = [
    	'name','intro','description','featured','locked'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    public function menus()
    {
        return $this->morphMany(Menu::class, 'menuable');
    }
}
