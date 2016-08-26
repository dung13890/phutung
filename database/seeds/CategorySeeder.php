<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 15)->create();
        $cateProduct = app(Category::class)->where('type','product')->where('parent_id',0)->get();
        $catePost = app(Category::class)->where('type','post')->where('parent_id',0)->get();
        factory(Category::class, 40)->create()->each(function ($category) use ($cateProduct, $catePost) {
        	if ($category->type == 'product') {
        		$category->update(['parent_id' => $cateProduct->lists('id')->random()]);
        	}
        	if ($category->type == 'post') {
        		$category->update(['parent_id' => $catePost->lists('id')->random()]);
        	}
        });
    }
}
