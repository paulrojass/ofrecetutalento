<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Talent;


class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }   
}
