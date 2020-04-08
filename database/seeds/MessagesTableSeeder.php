<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Message;
use App\Suscription;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = Suscription::where('plan_id','>', 2)->get();

    	foreach ($users as $user) {
			factory(Message::class,5)->create(['from_id'=>$user->user->id, 'to_id'=>User::all('id')->except($user->id)->random()]);
    	}
    }
}
