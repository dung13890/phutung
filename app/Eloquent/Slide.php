<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\GetImageTrait;

class Slide extends Model
{
	use GetImageTrait;

    protected $fillable = ['name','image','link','locked'];

    protected $appends = ['image_thumbnail','image_slide'];

    public $timestamps = false;

    public function getImageSlideAttribute($value)
    {
        return app()['glide.builder']->getUrl($this->image,['p' => 'slider']);
    }
}
