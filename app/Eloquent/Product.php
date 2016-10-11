<?php

namespace App\Eloquent;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;
use App\Traits\Eloquent\GetImageTrait;

class Product extends Abstracts\Sluggable implements TaggableInterface
{
    use TaggableTrait, GetImageTrait;

    protected $fillable = [
    	'name', 'code', 'image', 'file', 'description', 'price_show','provider_id', 'guide', 'youtube', 'guarantee', 'icon', 'qty','price', 'unit', 'model', 'origin', 'locale', 'type', 'locked', 'featured', 'user_id'
    ];

    protected $appends = ['image_thumbnail','image_small','image_medium', 'image_accessary'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
    }

    public function getImageAccessaryAttribute()
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => 'accessary']);
    }

    public function getImageProductAttribute()
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => 'product']);
    }

    public function getImageThumbnailSmallAttribute()
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => 'thumbnail_small']);
    }

    public function getIconDefaultAttribute()
    {
        return app()['glide.builder']->getUrl($this->icon);
    }
}
