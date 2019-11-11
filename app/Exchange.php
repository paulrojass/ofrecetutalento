<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Talent;
use App\File;
use App\Dealing;
use App\Like;
use App\Comment;

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

    public function dealings()
    {
        return $this->hasMany(Dealing::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
