<?php

use Illuminate\Database\Seeder;

use App\Industry;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industry = new Industry();
        $industry->name = 'Cocina';
   	    $industry->save();

        $industry = new Industry();
        $industry->name = 'Manufactura';
   	    $industry->save();

        $industry = new Industry();
        $industry->name = 'Computacion';
   	    $industry->save();
    }
}
