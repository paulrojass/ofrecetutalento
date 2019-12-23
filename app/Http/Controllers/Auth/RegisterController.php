<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\Plan;
use App\Suscription;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'lastname' => ['required', 'string', 'max:100'],
            'nationality' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:191'],
            'city' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'document' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'abilities' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'lastname' => $data['lastname'],
            'nationality' => $data['nationality'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'document' => $data['document'],
            'phone' => $data['phone'],
            'abilities' => $data['abilities'],

            'plan' => $data['plan']
        ]);

/*        $user->roles()->attach(Role::where('name', 'admin')->first());
        return $user;  */      
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

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        

        //Agregando suscripcion
        $this->newSuscription($user->id, $request->plan, $request->periodo);

        //Agregando Rol
        $user->roles()->attach(Role::where('name', 'user')->first());

        $this->guard()->login($user);

        return $this->registered($request, $user)
                       ?: redirect($this->redirectPath());
        
        //return response()->json(['success'=>'usuario registrado.', 'id_user' => $user->id]);
    }



}
