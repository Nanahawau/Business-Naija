<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(BusinessTableSeeders::class);
        $this->call(CategoryTableSeeders::class);
        $this->call(ContactTableSeeders::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
