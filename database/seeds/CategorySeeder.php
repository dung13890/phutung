<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Category;
use App\Eloquent\Image;

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
        $cateAccessary = app(Category::class)->where('type','accessary')->where('parent_id',0)->get();
        $catePost = app(Category::class)->where('type','post')->where('parent_id',0)->get();
        factory(Category::class, 40)->create()->each(function ($category) use ($cateProduct, $catePost, $cateAccessary) {
        	$category->images()->create([
                'name' => 'CHẤT LƯỢNG VƯỢT TRỘI - GIÁ CẢ CẠNH TRANH',
                'src' => '2016/08/backend/2/image/banner-004.jpg',
                'size' => 67645,
                'type' => 'image/jpeg'
            ]);
            if ($category->type == 'product') {
        		$category->update(['parent_id' => $cateProduct->lists('id')->random()]);
        	}
            if ($category->type == 'accessary') {
                $category->update(['parent_id' => $cateAccessary->lists('id')->random()]);
            }
        	if ($category->type == 'post') {
        		$category->update(['parent_id' => $catePost->lists('id')->random()]);
        	}
        });
    }
}
