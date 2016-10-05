<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    //
    protected $fillable = [
        'num', 'floor', 'type',
    ];

    public $timestamps = false;
}
