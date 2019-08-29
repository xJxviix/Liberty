<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'name'=>'Hamburguesas',
            'slug'=>'Hamburguesas',
        ]);
        
        DB::table('categories')->insert([
            'name'=>'Crepes',
            'slug'=>'Crepes',
        ]);

        DB::table('categories')->insert([
            'name'=>'Bebidas',
            'slug'=>'Bebidas',
        ]);

        DB::table('categories')->insert([
            'name'=>'Postres',
            'slug'=>'Postres',
        ]);
    }
}
