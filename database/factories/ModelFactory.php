<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Eloquent\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Eloquent\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(4, false),
        'type' => $faker->randomElement(config('developer.categories')),
        'description' => $faker->text,
        'locked' => rand(0,1),
    ];
});

$factory->define(App\Eloquent\Property::class, function (Faker\Generator $faker) {
    return [
        'key' => $faker->randomElement(['size','color','style']),
        'name' => $faker->colorName,
        'locked' => rand(0,1),
    ];
});

$factory->define(App\Eloquent\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(10, false),
        'intro' => $faker->text,
        'description' => $faker->paragraph(15, true),
        'featured' => rand(0,1),
        'image' => '2016/08/backend/2/image/banner-004.jpg',
        'locked' => rand(0,1),
    ];
});

$factory->define(App\Eloquent\Post::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(10, false),
        'intro' => $faker->text,
        'description' => $faker->paragraph(15, true),
        'user_id' => 2,
        'featured' => rand(0,1),
        'locked' => rand(0,1),
        'image' => '2016/08/backend/2/post/big-news.jpg',

    ];
});

$factory->define(App\Eloquent\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(10, false),
        'description' => $faker->paragraph(15, true),
        'type' => $faker->randomElement(config('developer.typeProduct')),
        'code' => $faker->ean8,
        'price' => $faker->randomNumber(6),
        'image' => '2016/08/backend/2/post/anonymous.jpg',
        'user_id' => 2,
        'locked' => rand(0,1),
        'featured' => rand(0,1),
    ];
});
