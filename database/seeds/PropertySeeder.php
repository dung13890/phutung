<?php

use Illuminate\Database\Seeder;
use App\Eloquent\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property::class, 21)->create();
    }
}
