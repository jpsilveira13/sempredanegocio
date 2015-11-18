<?php

use Illuminate\Database\Seeder;
use sempredanegocio\Models\Category;
use sempredanegocio\Models\SubCategory;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,4)->create()->each(function($c){
            for($i =0;$i<=3;$i++){
                $c->subcategory()->save(factory(SubCategory::class)->make());

            }

        });

    }
}
