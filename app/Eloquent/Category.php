<?php

namespace App\Eloquent;

class Category extends Abstracts\Sluggable
{
    protected $fillable = [
    	'name','parent_id','type','description','locked', 'locale', 'slogan', 'slogan_color_bg', 'slogan_color_text'
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
        $locale = session()->has('locale') ? session('locale') : 'vi';
        return $this->belongsToMany(Post::class)->where('locale', $locale)->orderBy('id', 'DESC');
    }

    public function products()
    {
        $locale = session()->has('locale') ? session('locale') : 'vi';
        return $this->belongsToMany(Product::class)->where('locale', $locale)->orderBy('id','DESC');
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

    public function designs()
    {
        return $this->morphMany(Design::class, 'designable')->orderBy('order', 'ASC');
    }

    public function banner()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
