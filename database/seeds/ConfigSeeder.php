<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(Config::class)->create([
        	'key' => 'name',
        	'value' => 'Phụ tùng Tân Phát',
        	'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'keywords',
        	'value' => '',
        	'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'description',
        	'value' => '',
        	'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'facebook',
        	'value' => '',
        	'type' => 'social'
        ]);
        app(Config::class)->create([
        	'key' => 'youtube',
        	'value' => '',
        	'type' => 'social'
        ]);
        app(Config::class)->create([
        	'key' => 'email',
        	'value' => 'tanphat@tanphat.com',
        	'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'phone',
        	'value' => '04 3681 2043 | FAX: 043 3681 2042',
        	'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'address',
        	'value' => 'Trụ sở chính: 168 Phan Trọng Tuệ - Thanh Trì - Hà Nội',
        	'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'scripts',
        	'value' => '',
        	'type' => 'text'
        ]);
        app(Config::class)->create([
        	'key' => 'logo',
        	'value' => '',
        	'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'slogan',
        	'value' => '',
        	'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'introduce',
        	'value' => '',
        	'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_image',
            'value' => '',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_image',
            'value' => '',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_name',
            'value' => '',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_name',
            'value' => '',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_link',
            'value' => '',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_link',
            'value' => '',
            'type' => 'text'
        ]);
    }
}
