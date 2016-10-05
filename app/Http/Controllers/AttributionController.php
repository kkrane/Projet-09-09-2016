<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Spot;
use App\Ticket;
use App\Attribution;
use Carbon\Carbon;

class AttributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attribution = new Attribution();

        $users = \Auth::user();
        $attribution->user_id = $users->id;

        /** Génération aléatoire de la place **/
        $spot_all = Spot::all();
        $i = 0;

        foreach ($spot_all as $spot){
            $spot_id_tmp = $spot->id;
            $tbl_spot_id[$i] = $spot_id_tmp; 
            $i++;
            
        }
        
        $spot_use = Attribution::where('end_at','>',\Carbon::now())->get();
       
        $i = 0;
        
        
        foreach ($spot_use as $spot_attr){
            $spot_attr_id = $spot_attr->spot_id;
            $tbl_spot_id_attr[$i] = $spot_attr_id; 
            $i++;

        }
        if (empty($tbl_spot_id_attr))
        {
            $key = array_rand($tbl_spot_id ,1);
            $attribution->spot_id = $tbl_spot_id[$key];
            $attribution->end_at = Carbon::now()->addMonth(1);
            $attribution->save();
            return redirect('/');    
        }
        $list = User::where('list','>','0')->count();
        /*** Comparer s'il y a des places libres ***/
        $nb_spot_all = count($spot_all);
        $nb_spot_use = count($spot_use);
        
   
        if($nb_spot_all == $nb_spot_use || $list > 0){
            $last = User::where('list','>','0')->orderBy('list','desc')->first();
            
            
            if($last == null){
                
                $users->list = 1;
                $users->save();
                
                return redirect('/');
            }
            $last->list++;

            $users->list = $last->list;
            
            $users->save();
            return redirect('/'); 
        }

        /*** S'il y a des places on lui en donne une nouvelle ***/

        $i = 0;
        $y = 0;
        $spotlibre = $tbl_spot_id;
        foreach($tbl_spot_id as $tmp_all){
            foreach($tbl_spot_id_attr as $tmp_attr){
                if ($tmp_all == $tmp_attr) {
                    
                    array_pull($spotlibre, $y);
                    $i++;  
                }
            }
            $y++;
        }
        
        
        $spot = array_rand($spotlibre ,1);
        $test = $spotlibre[$spot];
        
        /** On récupère un numéro de place libre et on l'attribue à spot_id **/

        $attribution->spot_id = $test;
        $attribution->end_at = Carbon::now()->addMonth(1);
        $attribution->save();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}