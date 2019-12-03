<?php

namespace App;

use App\Role;
use App\Talent;
use App\Suscription;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'lastname', 'nationality', 'address', 'city', 'country', 'document', 'phone', 'abilities', 'email', 'password', 'provider', 'provider_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/* Roles */
	public function roles()
	{
		return $this->belongsToMany(Role::class)->withTimestamps();
	}

	public function authorizeRoles($roles)
	{
		abort_unless($this->hasAnyRole($roles), 401);
		return true;
	}
	
	public function hasAnyRole($roles)
	{
		if (is_array($roles)) {
			foreach ($roles as $role) {
				if ($this->hasRole($role)) {
					return true;
				}
			}
		} else {
			if ($this->hasRole($roles)) {
				return true; 
			}   
		}
		return false;
	}
	
	public function hasRole($role)
	{
		if ($this->roles()->where('name', $role)->first()) {
			return true;
		}
		return false;
	}

	public function talents()
	{
		return $this->hasMany(Talent::class);
	}

	public function suscription()
	{
		return $this->hasOne(Suscription::class);
	}

//Query Scopes
	public function scopeTalent($query, $busqueda)
	{
		if($busqueda){
			return User::orWhereHas('talents', function (Builder $query) use($busqueda){
				$query->where('title', 'LIKE' , '%' . $busqueda . '%')->orWhere('description', 'LIKE' , '%' . $busqueda . '%');
			})->get();
		}
	}

	public function scopeLocation($query, $ubicacion)
	{
		if($ubicacion){
			return $query->where('city', 'LIKE', "%$ubicacion%")
			->orWhere('country', 'LIKE', "%$ubicacion%");
		}
	}

	public function scopeCategories($query, $categoria)
	{
		if($categoria){

			foreach ($request->category as $valor) {
				$users = $users->filter()->categories($valor);
			}
			
			return User::orWhereHas('talents', function (Builder $query) use($categoria){
				$query->where('category_id', $categoria);
			})->get();
		}
	}


}
