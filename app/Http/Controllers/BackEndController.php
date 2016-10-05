<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SpotRequest;
use App\User;
use App\Spot;
use App\Ticket;
use App\Attribution;

class BackEndController extends Controller
{
    public function showList() // Fonction pour la liste (c'est ça qu'il faut prendre)
    {
        $lists =  User::where('list','>', '0')->orderBy('list')->get();
        return view('home')->with(compact('lists'));
    }
}
}