<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Talent;

class File extends Model
{

	protected $fillable = [
		'name', 'description', 'type', 'location', 'talent_id'
	];


    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }
}
