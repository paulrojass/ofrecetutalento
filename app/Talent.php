<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Exchanges;
use App\Category;

class Talent extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exchanges()
    {
        return $this->belongsTo(Exchange::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
