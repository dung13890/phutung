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
        $prodCategories = app(Category::class)->where('type','product');
        $acceCategories = app(Category::class)->where('type','accessary');
        $properties = app(Property::class)->all();
        factory(Product::class, 40)->create()->each(function($product) use ($prodCategories, $acceCategories, $properties) {
            $product->properties()->attach($properties->lists('id')->random(5)->all());
        	if ($product->type == 'product') {
                $product->categories()->attach($prodCategories->lists('id')->random(5)->all());
            }
            if ($product->type == 'accessary') {
                $product->categories()->attach($acceCategories->lists('id')->random(5)->all());
            }
        });
    }
}
