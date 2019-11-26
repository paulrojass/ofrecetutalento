<?php

use Illuminate\Database\Seeder;

use App\Exchange;

class ExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Exchange::class,50)->create();
    }
}
