<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Role;
use App\Plan;
use App\Experience;
use App\Suscription;
use Carbon\Carbon;

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
/*        if(!(User::where('id', $user->id)->exists())){
            $user->roles()->attach(Role::where('name', 'user')->first());
            $this->newSuscription($user->id, 1, 'mensual');
            $this->newExperience($user->id);
        }*/
    
        auth()->login($user);
     
        return redirect()->to('/');
        //return response()->json(['success'=>'usuario registrado.', 'id_user' => $user->id]); 
    }

    function createUser($getInfo,$provider){
     
     $user = User::where('provider_id', $getInfo->id)->first();
     
     if (!$user) {
        $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id,
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
        
        $user->roles()->attach(Role::where('name', 'user')->first());
        $this->newSuscription($user->id, 1, 'mensual');
        $this->newExperience($user->id);

      }
      return $user;
    }
    
    public function newSuscription($user_id, $plan_id, $periodo){
        $suscripcion = new Suscription();
        $suscripcion->user_id = $user_id;
        $suscripcion->plan_id = $plan_id;
        if ($periodo == 'mensual') $suscripcion->expiration_date = Carbon::now()->addMonth();
        if ($periodo == 'trimestral') $suscripcion->expiration_date = Carbon::now()->addMonth(3);
        if ($periodo == 'anual') $suscripcion->expiration_date = Carbon::now()->addYear();
        $suscripcion->save();
    }

    public function newExperience($user_id){
        $experience = new Experience();
        $experience->user_id = $user_id;
        $experience->save();
    }    
}