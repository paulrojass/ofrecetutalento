<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Suscription;
class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
     
    public function callback($provider, $plan)
    {
               
        $getInfo = Socialite::driver($provider)->user();
         
        $user = $this->createUser($getInfo, $provider);
     
        auth()->login($user);

        //Agregando suscripcion
        $this->newSuscription($user->id, $plan);
     
        //return redirect()->to('/home');
        return response()->json(['success'=>'usuario registrado.', 'id_user' => $user->id]); 
    }

    function createUser($getInfo,$provider){
     
     $user = User::where('provider_id', $getInfo->id)->first();
     
     if (!$user) {
        $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
    }

    public function newSuscription($user_id, $plan_id){
        $suscripcion = new Suscription();
        $suscripcion->user_id = $user_id;
        $suscripcion->plan_id = $plan_id;

        $suscripcion->save();
    }
}