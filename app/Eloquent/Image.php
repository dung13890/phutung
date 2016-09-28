<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\GetImageTrait;

class Image extends Model
{
	use GetImageTrait;

    protected $fillable = [
    	'name','src','size','type'
    ];

    protected $appends = ['image_thumbnail','image_medium'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getImageAttribute()
    {
    	return $this->src;
    }

    public function getImageBannerAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->image,['p' => 'banner']);
    }

    public function getImageProductAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->image, ['p' => 'product']);
    }
}
