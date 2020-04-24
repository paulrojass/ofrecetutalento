<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Dealing extends Model
{
    public function user_propose()
    {
        return $this->belongsTo(User::class, 'propose_id');
    }
    public function user_accept()
    {
        return $this->belongsTo(User::class, 'accept_id');
    }
}
