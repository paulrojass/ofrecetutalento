<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exchange;

class File extends Model
{
    public function exchange()
    {
        return $this->belongsTo(Exchange::class)->withTimestamps();
    }
}
