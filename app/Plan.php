<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Suscription;

class Plan extends Model
{
    public function suscriptions()
    {
        return $this->hasMany(Suscription::class);
    }
}
