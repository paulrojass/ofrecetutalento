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
			factory(Talent::class,5)->create(['user_id'=>$user->id])->each(function($talent) use($user){
				factory(File::class,3)->create(['talent_id'=>$talent->id]);
				factory(Exchange::class,2)->create(['talent_id'=>$talent->id])->each(function($exchange) use($user, $talent){
                    $valor = [0,1];
                    $es_canje = Arr::random($valor);
                    if($es_canje) factory(Like::class,3)->create(['exchange_id'=>$exchange->id]);
                    else factory(Like::class,3)->create(['talent_id'=>$talent->id]);                    
					factory(Comment::class,5)->create([
                        'exchange_id'=>$exchange->id,
                        'evaluated_id'=>$user->id,
                        'user_id'=>User::all('id')->except($user->id)->random()
                    ]);
				});
			});
    	}
    }
}
