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
        $attributions=Attribution::all();
        return view("attribution_list")->with(compact('attributions'));
    }

    public function myCreate()
    {   
        $users = User::lists('email','id');
        $spots = Spot::lists('num','id');
        return view('attribution_form')->with(compact('users','spots'));   
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
        /*** Comparer s'il y a des places libres ***/
        $nb_spot_all = count($spot_use);
        $nb_spot_use = count($spot_all);
   
        if($nb_spot_all == $nb_spot_use){
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
        $attribution->begin_at = Carbon::now();
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
        $attribution = new Attribution();
        $attribution->user_id = $request->input('user');
        $attribution->spot_id = $request->input('spot');
        $attribution->begin_at = Carbon::CreateFromFormat('Y/m/d h:i:s',$request->input('begin').'00:00:00');
        $attribution->end_at = Carbon::CreateFromFormat('Y/m/d h:i:s',$request->input('end').'00:00:00');
        if($check_spot = Attribution::where('spot_id','=',$attribution->spot_id)->first()){
            return redirect()->back()->with('used_spot','Cette place est déjà utilisée, veuillez en choisir une autre');
        }
        if($current_user = User::where('id','=',$request->input('user'))->where('list','>','0')->first()){
            $users = User::where('list','>',$current_user->list)->get();
            foreach($users as $user){
                $user->list--;
                $user->save();
            }
            $current_user->list = 0;
            $current_user->save();
        }
        if($check_attribution = Attribution::where('user_id','=',$attribution->user_id)->first()){
            $check_attribution->delete();
        }
        $attribution->save();
        return redirect()->route('attribution.index');
        
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
    public function adminEdit($id)
    {
        if(\Auth::user() && \Auth::user()->status == 2){
            $users = User::lists('email','id');
            $spots = Spot::lists('num','id');
            $attribution = Attribution::find($id);
            return view('attribution_form')->with(compact('attribution','users','spots'));
        }
        
        return "acces denied";
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
        $attribution = Attribution::find($id);
        if($check_spot = Attribution::where('spot_id','=',$attribution->spot_id)->where('id','!=',$attribution->id)->first()){
            return redirect()->back()->with('used_spot','Cette place est déjà utilisée, veuillez en choisir une autre');
        }
        if($current_user = User::where('id','=',$request->input('user'))->where('list','>','0')->first()){
            $users = User::where('list','>',$current_user->list)->get();
            foreach($users as $user){
                $user->list--;
                $user->save();
            }
            $current_user->list = 0;
            $current_user->save();
        }
        $attribution->user_id = $request->input('user');
        $attribution->spot_id = $request->input('spot');
        $attribution->begin_at = Carbon::CreateFromFOrmat('Y-m-d H:i:s',$request->input('begin'));
        $attribution->end_at = Carbon::CreateFromFOrmat('Y-m-d H:i:s',$request->input('end'));
        
        if($check_attribution = Attribution::where('user_id','=',$attribution->user_id)->first()){
            $check_attribution->delete();
        }
        $attribution->save();
        return redirect()->route('attribution.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribution = Attribution::where('id','=',$id);
        $attribution->delete();
        return redirect()->back();
    }
}