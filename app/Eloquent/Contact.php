<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'topic', 'name', 'address', 'phone', 'fax', 'email', 'content'
    ];
}
