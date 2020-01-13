<?php

namespace App;

use App\Role;
use App\Talent;
use App\Suscription;
use App\Language;
use App\Experience;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


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

	public function languages(){
		return $this->hasMany(Language::class);
	}

	public function experiences(){
		return $this->hasOne(Experience::class);
	}

	public function hasAnyTalent()
	{
		$contador = Talent::where('user_id', $this->id)->count();
		if ($contador > 0 ) return true;
		return false;
	}

//Query Scopes
	public function scopeTalent($query, $busqueda)
	{
		if($busqueda){
			return $query->WhereHas('talents', function (Builder $query) use($busqueda)
			{
				$query->where('title', 'LIKE' , '%' . $busqueda . '%')
					->orWhere('description', 'LIKE' , '%' . $busqueda . '%');
			});
		}
	}

	public function scopeLocation($query, $ubicacion)
	{
		if($ubicacion){
			return $query->where('city', 'LIKE', '%'.$ubicacion.'%')
			->orWhere('country', 'LIKE', '%'.$ubicacion.'%');
		}
	}

	public function scopeCategories($query, $categorias)
	{
		if($categorias != NULL){

			foreach ($categorias as $categoria) {
				$query->whereHas('talents', function (Builder $query) use($categoria){
					$query->where('category_id', $categoria);
				});
			}

			return $query;
		}
	}


}
