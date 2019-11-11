<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Exchange;

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
}
