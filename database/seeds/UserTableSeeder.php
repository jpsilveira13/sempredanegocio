<?php

use Illuminate\Database\Seeder;
use sempredanegocio\Models\User;
use sempredanegocio\Models\Advertiser;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,10)->create();

        /*->each(function($u){
            $u->advertiser()->save(factory(Advertiser::class)->make());
        }); */
    }
}
