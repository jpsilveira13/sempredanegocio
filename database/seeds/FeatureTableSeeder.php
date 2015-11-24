<?php

use Illuminate\Database\Seeder;
use sempredanegocio\Models\Feature;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Feature::class,4)->create();

    }
}
