<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

use DB;

use App\Talent;
use App\Dealing;
use App\Like;
use App\Comment;
use App\File;

class Exchange extends Model
{
	public function talent()
	{
		return $this->belongsTo(Talent::class);
	}

/*	public function files()
	{
		return $this->hasMany(File::class);
	}*/

	public function dealings()
	{
		return $this->hasMany(Dealing::class);
	}

	public function proposals()
	{
		return $this->hasMany(Dealing::class, 'proposal_id');
	}


	//Cotratadores
    public function contractors()
    {
        return $this->hasMany(Dealing::class, 'propose_id');
    }
    //Contratados
    public function hired()
    {
        return $this->hasMany(Dealing::class, 'accept_id');
    }



	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function scopeSearch($query, $search)
	{
		if($search){
			return $query->where('title', 'LIKE', '%'.$search.'%')
			->orWhere('description', 'LIKE', '%'.$search.'%');
		}
	}

	public function scopeDate($query, $date)
	{
		if($date){
			return $query->where('created_at', '>', $date);
		}
	}

	public function scopeMin($query, $minimo)
	{
		if($minimo){
			return $query->where('price', '>=', $minimo);
		}
	}

	public function scopeMax($query, $maximo)
	{
		if($maximo){
			return $query->where('price', '<=', $maximo);
		}
	}

	public function scopeCategories($query, $categorias)
	{
		$talents = Talent::whereIn('category_id', $categorias)->get('id')->toArray();
		$query->whereIn('talent_id', $talents);
		return $query;
	}
}
