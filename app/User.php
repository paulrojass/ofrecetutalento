<?php

namespace App;

use App\Role;
use App\Talent;
use App\Suscription;
use App\Language;
use App\Experience;
use App\Message;
use App\Category;
use App\Comment;
use App\Dealing;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Traits\DatesTranslator;

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

    public function exchanges()
    {
        return $this->hasManyThrough('App\Exchange', 'App\Talent');
    }


	public function suscription()
	{
		return $this->hasOne(Suscription::class);
	}

	public function languages(){
		return $this->hasMany(Language::class);
	}
	//Evaluadores
	public function evaluators(){
		return $this->hasMany(Cooment::class, 'user_id');
	}	
	//Evaluados
	public function evaluated(){
		return $this->hasMany(Comment::class, 'evaluated_id');
	}

    public function users_propose()
    {
        return $this->hasMany(Dealing::class, 'proposal_id');
    }
    public function users_accept()
    {
        return $this->hasMany(Dealing::class, 'accept_id');
    }

	public function experiences(){
		return $this->hasOne(Experience::class);
	}

	public function users_to(){
		return $this->hasMany(Message::class, 'to_id');
	}

	public function users_from(){
		return $this->hasMany(Message::class, 'from_id');
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
			})->orWhere('name', 'LIKE', '%'.$busqueda.'%')->orWhere('lastname', 'LIKE', '%'.$busqueda.'%')->orWhere('email', 'LIKE', '%'.$busqueda.'%');
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

/*	public function scopeCategory($query, $industry)
	{
		$categorias = Category::where('industry_id', $industry)->get();


		if($category){
			$query->whereHas('talents', function (Builder $query) use($categoria){
				$query->where('category_id', $categoria);
			});
			return $query;
		}
	}*/

}
