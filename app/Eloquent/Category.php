<?php

namespace App\Eloquent;

class Category extends Abstracts\Sluggable
{
    protected $fillable = [
    	'name','parent_id','type','description','locked'
    ];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class)->orderBy('id', 'DESC');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->orderBy('id','DESC');
    }

    public function randomProducts()
    {
        return $this->products()->orderByRaw("RAND()")->take(8);
    }

    public function menus()
    {
        return $this->morphMany(Menu::class, 'menuable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function banner()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
