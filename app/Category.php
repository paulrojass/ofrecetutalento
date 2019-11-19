<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Industry;
use App\Talent;

class Category extends Model
{
    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function talents()
    {
        return $this->hasMany(Talent::class);
    }
}
