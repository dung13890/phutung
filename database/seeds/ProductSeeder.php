<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Product;
use App\Eloquent\Category;
use App\Eloquent\Property;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = app(Category::class)->where('type','product');
        $properties = app(Property::class)->all();
        factory(Product::class, 20)->create()->each(function($product) use ($categories, $properties) {
        	$product->categories()->attach($categories->lists('id')->random(5)->all());
        	$product->properties()->attach($properties->lists('id')->random(5)->all());
        });
    }
}
