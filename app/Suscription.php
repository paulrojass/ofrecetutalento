<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Plan;
use App\User;

class Suscription extends Model
{
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
