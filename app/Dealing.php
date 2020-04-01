<?php

namespace App;

use App\Exchange;

use Illuminate\Database\Eloquent\Model;

class Dealing extends Model
{
    public function user_propose()
    {
        return $this->belongsTo(Exchange::class, 'proposal_id');
    }
    public function user_accept()
    {
        return $this->belongsTo(Exchange::class, 'accept_id');
    }
}
