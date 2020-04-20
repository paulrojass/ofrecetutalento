<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

use App\User;
use App\Exchanges;
use App\Category;
use App\Like;

class Talent extends Model
{
	protected $fillable = [
		'title', 'description', 'level'
	];


	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function exchanges()
	{
		return $this->hasMany(Exchange::class);
	}

	public function files()
	{
		return $this->hasMany(File::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}


//Query Scopes
	public function scopeTitle(Builder $query, $busqueda)
	{
		if($busqueda){
			return $query->where('title', 'LIKE', '%'.$busqueda.'%');
		}
	}

	public function scopeDescription(Builder $query, $busqueda)
	{
		if($busqueda){
			return $query->where('description', 'LIKE', '%'.$busqueda.'%');
		}
	}

}
