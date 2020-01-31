<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Message;

class MessagesTableSeeder extends Seeder
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
			factory(Message::class,5)->create(['from_id'=>$user->id]);
    	}
    }
}
