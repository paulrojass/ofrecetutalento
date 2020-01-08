<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Talent;
use App\Language;
use App\Experience;
use App\Suscription;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(User::class,20)->create()->each(function($user){
			factory(Talent::class,5)->create(['user_id'=>$user->id]);
			factory(Language::class,5)->create(['user_id'=>$user->id]);
			factory(Experience::class,1)->create(['user_id'=>$user->id]);
            factory(Suscription::class,1)->create(['user_id'=>$user->id]);
			$user->roles()->attach(Role::where('name', 'user')->first());
		});
    }

}
