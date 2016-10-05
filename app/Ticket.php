<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable = [
        'message'
    ];
    
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
