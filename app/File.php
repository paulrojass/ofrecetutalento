<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exchange;

class File extends Model
{

	protected $fillable = [
		'name', 'description', 'type', 'location', 'exchange_id'
	];


    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }
}
