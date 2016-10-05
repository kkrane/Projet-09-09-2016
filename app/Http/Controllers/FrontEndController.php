<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Spot;
use App\Ticket;
use App\Attribution;
use Carbon\Carbon;

class FrontEndController extends Controller
{    
    public function index()
    {
        $users = \Auth::user();
        

        $testattributions = Attribution::where('user_id','=',$users->id)->where('end_at','>',Carbon::now())->count();

        if($testattributions > 0){
            $attributions = Attribution::where('user_id','=',$users->id)->where('end_at','>',Carbon::now())->first();
            $attributions->end_at = \Carbon::parse($attributions->end_at);
        }
        else 
            $attributions = null;
        $lists =  User::where('list','>', '0')->orderBy('list')->get();
        
        $nbUser = User::all()->count();
        $nbSpot = Spot::all()->count();
        $nbAttribution = Attribution::all()->count();
        $nbTicket = Ticket::all()->count();
        $historiques = Attribution::where('user_id','=',$users->id)->orderBy('end_at', 'desc')->get();
        
        
        /********************************************************************/
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
        
        $list = User::Where('list','>','0')->count();
        /*** Comparer s'il y a des places libres ***/
        $nb_spot_all = count($spot_all);
        $nb_spot_use = count($spot_use);
        $free_spots = $nb_spot_all - $nb_spot_use;
        if($free_spots > 0 && $list > 0){
            $out_of_list = User::where('list','>','0')->orderBy('list','asc')->first();
            if ($out_of_list){
            $out_of_list->list = NULL;
            $out_of_list->save();
            
            $attribution = new Attribution();
            $attribution->user_id = $out_of_list->id;
            
            
            
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
            
            if (!empty($spotlibre)){
            $spot = array_rand($spotlibre ,1);
            $test = $spotlibre[$spot];
            
            
            
            /** On récupère un numéro de place libre et on l'attribue à spot_id **/ 

            $attribution->spot_id = $test;
            $attribution->end_at = Carbon::now()->addMonth(1);
            $attribution->save();
            }
                
            if ($user_list = User::where('list','>','0')->orderBy('list','asc')->get())
            {
                foreach($user_list as $up_in_list){
                    $up_in_list->list--;
                    $up_in_list->save();
                }
            }
            }
            
        }
        /********************************************************************/
        $users = User::find(\Auth::user()->id);
        $status = $users->status;
        return view('welcome')->with(compact('users','status','attributions','historiques','nbUser','nbSpot','nbAttribution','nbTicket','lists'));


    }
    
    public function loginForm()
    {
        if(!Auth::user()){
            return view('login_form');
        }
    }
}
