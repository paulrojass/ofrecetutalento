<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Message extends Model
{
    public function user_to()
    {
        return $this->belongsTo(User::class, 'to_id', 'id');
    }

    public function user_from()
    {
        return $this->belongsTo(User::class, 'from_id', 'id');
    }
}
