<?php

namespace App\Eloquent;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;
use App\Traits\Eloquent\GetImageTrait;

class Product extends Abstracts\Sluggable implements TaggableInterface
{
    use TaggableTrait, GetImageTrait;

    protected $fillable = [
    	'name', 'code', 'image', 'description', 'provider_id', 'guide', 'youtube', 'guarantee', 'price', 'model', 'origin', 'locale', 'type', 'locked', 'featured', 'user_id'
    ];

    protected $appends = ['image_thumbnail','image_small','image_medium'];

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
}
