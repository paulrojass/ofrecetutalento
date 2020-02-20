<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Role;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
     
    public function callback($provider)
    {
               
        $getInfo = Socialite::driver($provider)->user();
         
        $user = $this->createUser($getInfo, $provider);
        
        //Agregando Rol
        $existe = User::where('email', $user->email)->first();
        if($existe->count() == 0){
            $user->roles()->attach(Role::where('name', 'user')->first());
            $user->newExperience($user->id);
        }
    
        auth()->login($user);
     
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
}