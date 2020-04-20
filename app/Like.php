<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Exchange;
use App\Talent;

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }
}
