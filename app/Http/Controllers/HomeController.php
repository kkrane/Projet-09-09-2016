<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Spot;
use App\Attribution;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $nbUser = User::all()->count();
        $nbSpot = Spot::all()->count();
        $nbAttribution = Attribution::all()->count();
        $nbTicket = Ticket::all()->count();
        return view('home')->with(compact('user'))
                           ->with(compact('nbUser'))
                           ->with(compact('nbSpot'))
                           ->with(compact('nbAttribution'));
    }
}
