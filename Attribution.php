<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Spot;


class Attribution extends Model
{
    public $timestamps = false;
    

    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function Spot() {
        return $this->belongsTo(Spot::class, 'spot_id');
    }
}
