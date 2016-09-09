<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['key', 'value', 'type', 'locale'];

    public $timestamps = false;

    public function getLogoHeaderAttribute()
    {
    	if ($this->key == 'logo_header') {
        	return app()['glide.builder']->getUrl($this->value);
    	}
    }

    public function getLogoFooterAttribute()
    {
        if ($this->key == 'logo_footer') {
            return app()['glide.builder']->getUrl($this->value);
        }
    }

    public function getBoxLeftImageAttribute()
    {
    	if ($this->key == 'box_left_image') {
        	return app()['glide.builder']->getUrl($this->value);
    	}
    }

    public function getBoxRightImageAttribute()
    {
    	if ($this->key == 'box_right_image') {
        	return app()['glide.builder']->getUrl($this->value);
    	}
    }
}
