<?php

namespace App\Eloquent;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;
use App\Traits\Eloquent\GetImageTrait;

class Page extends Abstracts\Sluggable implements TaggableInterface
{
    use TaggableTrait, GetImageTrait;

    protected $fillable = [
    	'name','intro','description', 'image', 'featured','locked'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    public function getImageBannerAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->image,['p' => 'banner']);
    }

    public function menus()
    {
        return $this->morphMany(Menu::class, 'menuable');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }
}
