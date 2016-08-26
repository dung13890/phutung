<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Post;
use App\Eloquent\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = app(Category::class)->where('type','post');
        factory(Post::class, 15)->create()->each(function($post) use ($categories) {
        	$post->categories()->attach($categories->lists('id')->random(5)->all());
        });
    }
}
