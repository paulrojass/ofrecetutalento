<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Talent;
use App\Exchange;
use App\File;
use App\Like;
use App\Comment;

class TalentsTableSeeder extends Seeder
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
			factory(Talent::class,5)->create(['user_id'=>$user->id])->each(function($talent){
				factory(Exchange::class,2)->create(['talent_id'=>$talent->id])->each(function($exchange){
					factory(File::class,3)->create(['exchange_id'=>$exchange->id]);
					factory(Like::class,3)->create(['exchange_id'=>$exchange->id]);
					factory(Comment::class,2)->create(['exchange_id'=>$exchange->id]);
				});
			});
    	}
    }
}
