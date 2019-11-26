<?php

use Illuminate\Database\Seeder;

use App\Talent;

class TalentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Talent::class,50)->create();
    }
}
