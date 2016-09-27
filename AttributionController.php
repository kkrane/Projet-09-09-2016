<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\UserRequests;
use App\Attribution;
use App\Spot;
use App\Auth;

class AttributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.attribution');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $attribution->user_id = \Auth::user()->user_id;

        $spotall = Spot::all();
        $i = 0;
        foreach ($spotall as $spot){
            $tmpg = $spot->id;
            $tmp[$i] = $tmpg; 
            $i++;
        }
        
        $spotuse = Attribution::all();
        $i = 0;
        foreach ($spotuse as $spotg){
            $tmpgr = $spotg->spot_id;
            $tmp2[$i] = $tmpgr; 
            $i++;
        }
        $t = 0;
        foreach($tmp as $tmpz){
            foreach($tmp2 as $tmph){
                if ($tmpz != $tmph) {
                    $spotlibre[$t] =$tmpz;
                    $t++;  
                }
            }
        }

        
        
        $spot = array_rand($spotlibre ,1);
        $attribution->spot_id = $spot;
        $attribution->end_at = Carbon::now()->addMonth(1);
        /** if(!empty($spot))
            $attribution->spot_id = $spot;
        else
            return redirect()->route('user.waitinglist', [$user]);

        $attribution->save();**/
        
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
    public function show(Attribution $attribution)
    {
        return view('admin.attribution.show');
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
    public function destroy(Attribution $attribution)
    {
        $attribution->delete();
        return view('admin.attribution.show');
    }
}
