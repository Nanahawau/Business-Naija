<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contacts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('contacts')->insert([
                'business_id' => $faker->unique()->numberBetween(1, 20),
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'address' => $faker->address,
            ]);


        }
    }
}
