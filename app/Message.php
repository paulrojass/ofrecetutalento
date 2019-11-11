<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Message extends Model
{
    public function from()
    {
        return $this->belongsTo(User::class);
    } 
    public function to()
    {
        return $this->belongsTo(User::class);
    } 
}
