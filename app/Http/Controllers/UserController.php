<?php
gijrgjregurjgiegfrigre
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(\Auth::user() && \Auth::user()->status == 2){
            $users = User::all();
            return view('user_list')->with(compact('users'));
        }
        return "access denied";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->except('_token'));
        $user->status = 0;
        $user->password = bcrypt($user->password);
        $user->save();
        if (\Auth::attempt(['email' => $user->email, 'password' => $user->password]))
            echo "yolo";
        return redirect()->route('user.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = User::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user() && \Auth::user()->status == 2){
            $user = User::find($id);
            return view('register')->with(compact('user'));
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        if($request->input('password'))
            $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Auth::user() && \Auth::user()->status == 2){
            $user = User::find($id);
            if($user->status != 2)
                $user->delete();
            $deleted = $user->email;
            return back()->with(compact('deleted'));
        }
    }
    
    public function validation($id)
    {
        if(\Auth::user() && \Auth::user()->status == 2){
            $user = User::find($id);
            $user->status = 1;
            $user->save();
            return back();
        }
        
    }
}
