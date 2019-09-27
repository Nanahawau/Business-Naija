<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //]

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('businesses')->truncate();
        DB::table('business_category')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        $faker = \Faker\Factory::create();
            for($i = 1; $i <= 20; $i++){
                DB::table('businesses')->insert([
               'name' => $faker->company,
                'description' => $faker->text(200),
            ]);

            }

        for($i = 1; $i <= 20; $i++) {
            DB::table('business_category')->insert([

                'business_id' => $faker->numberBetween(1, 20),
                'category_id' => $faker->numberBetween(1, 11)

            ]);
        }







    }



}
