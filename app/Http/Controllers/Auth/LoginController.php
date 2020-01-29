<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
   //protected $redirectTo = '/home';

	/*protected function redirectTo()*/
	protected function redirectPath()
	{
		if (auth()->user()->hasRole('user')) {
			if((auth()->user()->suscription->plan_id > 1) && (!auth()->user()->hasAnyTalent())) return 'suscripcion-talentos';
			/*para redireccionar atras luego de login*/
			return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
		}
		return 'panel';
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
		/*para redireccionar atras luego de login*/
    	Session::put('backUrl', URL::previous());
	}
}
