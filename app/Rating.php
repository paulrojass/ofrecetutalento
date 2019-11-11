<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Rating extends Model
{
    public function evaluator()
    {
        return $this->belongsTo(User::class);
    }

    public function evaluated()
    {
        return $this->belongsTo(User::class);
    }
}
