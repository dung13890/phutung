<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
    	'name', 'address', 'phone', 'email', 'locked'
    ];
}
