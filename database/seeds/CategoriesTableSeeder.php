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
        $category = new Category();
        $category->name = 'Pasteleria';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Panaderia';
        $category->industry_id = '1';
   	    $category->save();

        $category = new Category();
        $category->name = 'Bolsos';
        $category->industry_id = '2';
   	    $category->save();

        $category = new Category();
        $category->name = 'Ropa';
        $category->industry_id = '2';
   	    $category->save();

        $category = new Category();
        $category->name = 'Reparacion';
        $category->industry_id = '3';
   	    $category->save();

        $category = new Category();
        $category->name = 'Desarrollo';
        $category->industry_id = '3';
   	    $category->save();
    }
}
