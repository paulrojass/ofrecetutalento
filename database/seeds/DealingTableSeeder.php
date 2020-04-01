<?php

use Illuminate\Database\Seeder;

use App\Dealing;
use App\User;

class DealingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = User::all();
    	foreach ($users as $user) {
			factory(Dealing::class,5)->create(['propose_id'=>$user->id]);
    	}
    }
}
