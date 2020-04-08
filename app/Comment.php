<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Talent;


class Comment extends Model
{
    public function evaluator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluated()
    {
    	return $this->belongsTo(User::class, 'evaluated_id');
    }
/*
    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }  */ 
}
