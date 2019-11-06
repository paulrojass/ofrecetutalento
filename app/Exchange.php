<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Talent;
use App\File;

class Exchange extends Model
{
    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

}
