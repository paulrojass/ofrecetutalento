<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
