<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

use App\User;
use App\Exchanges;
use App\Category;

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
		return $this->belongsTo(Exchange::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
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
