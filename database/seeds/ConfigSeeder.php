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
        	'locale' => 'vi',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'keywords',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'description',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
        	'key' => 'facebook',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'social'
        ]);
        app(Config::class)->create([
        	'key' => 'youtube',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'social'
        ]);
        app(Config::class)->create([
        	'key' => 'email',
        	'value' => 'tanphat@tanphat.com',
        	'locale' => 'vi',
            'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'phone',
        	'value' => '04 3681 2043 | FAX: 043 3681 2042',
        	'locale' => 'vi',
            'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'address',
        	'value' => 'Trụ sở chính: 168 Phan Trọng Tuệ - Thanh Trì - Hà Nội',
        	'locale' => 'vi',
            'type' => 'string'
        ]);
        app(Config::class)->create([
        	'key' => 'scripts',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'slogan',
            'value' => '',
            'locale' => 'vi',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'introduce',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_image',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_image',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_name',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_name',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_link',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_link',
            'value' => '',
            'locale' => 'vi',
            'type' => 'text'
        ]);



        app(Config::class)->create([
            'key' => 'name',
            'value' => 'Phụ tùng Tân Phát',
            'locale' => 'en',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
            'key' => 'keywords',
            'value' => '',
            'locale' => 'en',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
            'key' => 'description',
            'value' => '',
            'locale' => 'en',
            'type' => 'seo'
        ]);
        app(Config::class)->create([
            'key' => 'facebook',
            'value' => '',
            'locale' => 'en',
            'type' => 'social'
        ]);
        app(Config::class)->create([
            'key' => 'youtube',
            'value' => '',
            'locale' => 'en',
            'type' => 'social'
        ]);
        app(Config::class)->create([
            'key' => 'email',
            'value' => 'tanphat@tanphat.com',
            'locale' => 'en',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'phone',
            'value' => '04 3681 2043 | FAX: 043 3681 2042',
            'locale' => 'en',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'address',
            'value' => 'Trụ sở chính: 168 Phan Trọng Tuệ - Thanh Trì - Hà Nội',
            'locale' => 'en',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'scripts',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'logo',
            'value' => '',
            'locale' => 'en',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'slogan',
            'value' => '',
            'locale' => 'en',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'introduce',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_image',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_image',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_name',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_name',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_left_link',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
            'key' => 'box_right_link',
            'value' => '',
            'locale' => 'en',
            'type' => 'text'
        ]);
        app(Config::class)->create([
        	'key' => 'logo_header',
        	'value' => '',
        	'locale' => 'vi',
            'type' => 'string'
        ]);
        app(Config::class)->create([
            'key' => 'logo_footer',
            'value' => '',
            'locale' => 'vi',
            'type' => 'string'
        ]);
    }
}
