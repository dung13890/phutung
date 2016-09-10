<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(AbilitySeeder::class);
         $this->call(ConfigSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(PropertySeeder::class);
         $this->call(PageSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(ProductSeeder::class);
    }
}
