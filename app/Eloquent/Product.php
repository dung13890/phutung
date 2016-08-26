<?php

namespace App\Eloquent;

use Cartalyst\Tags\TaggableInterface;
use Cartalyst\Tags\TaggableTrait;
use App\Traits\Eloquent\GetImageTrait;

class Product extends Abstracts\Sluggable implements TaggableInterface
{
    use TaggableTrait, GetImageTrait;

    protected $fillable = [
    	'name','code','image','description','price','price_sale','sale','locked','featured','user_id'
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

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity','price','property');
    }
}
