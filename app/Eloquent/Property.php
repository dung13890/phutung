<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
    	'key','name','locked'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
