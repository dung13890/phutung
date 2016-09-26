<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
    	'name', 'file', 'locked', 'description', 'category_id'
    ];	

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
