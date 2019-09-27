<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 50; $i++){

            DB::table('reviews')->insert([

               'review' => $faker->realText(200),
               'business_id' => $faker->numberBetween(1, 20),
               'user_id' => $faker->numberBetween(1, 20)
            ]);

        }
    }
}
