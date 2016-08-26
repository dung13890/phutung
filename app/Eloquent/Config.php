<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['key','value','type'];

    public $timestamps = false;

    public function getLogoAttribute()
    {
    	if ($this->key == 'logo') {
        	return app()['glide.builder']->getUrl($this->value);
    	}
    }

    public function getBoxLeftImageAttribute()
    {
    	if ($this->key == 'box_left_image') {
        	return app()['glide.builder']->getUrl($this->value, ['p' => 'small']);
    	}
    }

    public function getBoxRightImageAttribute()
    {
    	if ($this->key == 'box_right_image') {
        	return app()['glide.builder']->getUrl($this->value, ['p' => 'small']);
    	}
    }
}
