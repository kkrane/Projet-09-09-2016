<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Spot;
use App\Ticket;
use App\Attribution;


class FrontEndController extends Controller
{
    public function test()
    {
        $user = User::find(1);
        var_dump($user);
    }
}
