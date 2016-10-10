<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Eloquent\GetImageTrait;

class Design extends Model
{
	use GetImageTrait;

    protected $fillable = [
    	'name', 'code', 'provider', 'other', 'image', 'link', 'order'
    ];

    protected $appends = ['image_thumbnail','image_medium'];

    public function designable()
    {
        return $this->morphTo();
    }
}
