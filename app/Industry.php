<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\Talent;

class Industry extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
