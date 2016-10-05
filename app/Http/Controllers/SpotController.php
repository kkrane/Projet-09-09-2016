<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SpotRequest;
use App\Spot;


class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spots = Spot::all();
        return view('spot_list')->with(compact('spots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.addSpot');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpotRequest $request)
    {
        $spot = new Spot($request->except('_token'));
        if($spot->num < 10)
            $spot->num = '0'.$spot->num;
        $spot->num = $spot->floor.''.$spot->num;
        if(Spot::where('num','=',$spot->num)->count()== 0)
            $spot->save();
        else{
            return redirect()->back()->with('taken',[1]);
        }
        return redirect()->route('spot.index');
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
        $spot = Spot::find($id);
        return view('admin.addSpot')->with(compact('spot'));
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
        $spot = Spot::find($id);
        $spot->num = $request->input('num');
        $spot->type = $request->input('type');
        $spot->save();
        return redirect()->route('spot.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spot = Spot::find($id);
        $spot->delete();
        return redirect()->back();
    }
}
