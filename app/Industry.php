<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Industry extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
