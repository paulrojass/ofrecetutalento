<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;


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

	public function files()
	{
		return $this->hasMany(File::class);
	}

/*	public function dealings()
	{
		return $this->hasMany(Dealing::class);
	}*/

	//Cotratadores
    public function contractors()
    {
        return $this->hasMany(Dealing::class, 'proposal_id');
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

/*	public function scopeCategory($query, $categorias){
		if($categorias != NULL){

			foreach ($categorias as $categoria) {
				$query->where('talent_id', function (Builder $query) use($categoria){
					$query->whereHas('category_id', $categoria);
				});
			}

			return $query;
		}
	}*/

	//exchange->talent->user->city
	/*public function scopeLocation($query, $ubicacion){
		if($ubicacion){
			return $query->talent->


			return $query->where('talent_id', function(Builder $query) use($ubicacion){
				$query->whereHas('')
			});
		}
	}*/
}
