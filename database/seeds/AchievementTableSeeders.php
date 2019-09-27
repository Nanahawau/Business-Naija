<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementTableSeeders extends Seeder
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
            DB::table('achievements')->insert([
               'achievement' => $faker->realText(150),
               'business_id' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
