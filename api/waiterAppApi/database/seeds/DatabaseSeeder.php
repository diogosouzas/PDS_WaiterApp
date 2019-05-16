<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //DB::statement('SET foreign_key_checks - 0',);
        //DB::statement('SET foreign_key_checks - 1',);
        Model::reguard();
        // $this->call(UsersTableSeeder::class);
    }
}
