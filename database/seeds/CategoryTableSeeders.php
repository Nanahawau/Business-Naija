<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

//        DB::table('categories')->truncate();

        $category = New \App\Category();
        $category->create([
            'name' =>'Arts, crafts, and collectibles'
        ]);
        $category->create([
            'name' =>'Beauty and fragrances'
        ]);
        $category->create([
            'name' =>'Computers, accessories, and services'
        ]);
        $category->create([
            'name' =>'Food retail and service'
        ]);
        $category->create([
            'name' =>'Services - other'
        ]);
        $category->create([
            'name' =>'Vehicle sales'
        ]);
        $category->create([
            'name' =>'Pets and animals'
        ]);
        $category->create([
            'name' =>'Sports and outdoors'
        ]);
        $category->create([
           'name' => 'Entertainment and media'
        ]);
        $category->create([
            'name' => 'Gifts and flowers.'
        ]);
        $category->create([
           'name' => 'Others'
        ]);
    }
}
