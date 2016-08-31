<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\GetImageTrait;

class Provider extends Model
{
	use GetImageTrait;
	
    protected $fillable = [
    	'name', 'phone', 'email', 'address', 'locked', 'image'
    ];

    protected $appends = ['image_thumbnail','image_small'];

    public function getImageTinyAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->image,['p' => 'tiny']);
    }
}
