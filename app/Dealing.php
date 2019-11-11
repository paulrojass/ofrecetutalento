<?php

namespace App;

use App\User;
use App\Exchange;

use Illuminate\Database\Eloquent\Model;

class Dealing extends Model
{
    public function propose()
    {
        return $this->belongsTo(User::class);
    }
    public function accept()
    {
        return $this->belongsTo(User::class);
    }
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    } 
}
