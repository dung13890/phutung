<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    	'name', 'file', 'locked', 'description'
    ];	
}
