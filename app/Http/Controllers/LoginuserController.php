<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Activeuser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\MessageBag;


class LoginuserController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('userlogin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
        ]);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        // Authentication passed...
           
        $users=new Activeuser;
        $user = Auth::user()->id;
        $users->userid=$user;
        $users->save();
        
        $alluser=User::all();
        // 
            $user = Auth::user();
          
            if ($user->hasRole(1)) {
                return redirect()->route('socialuser.index');
            }
            else{
                return redirect()->route('home');
            }
        }
        else{
            $errors = new MessageBag(['email'=>['Email or Pssword invalid']]);
            return Redirect::back()->withErrors($errors);
         
        }
        

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

    public function logout(Request $request)
    {

        $user = Auth::user()->id;
        $users = DB::table('activeusers')->where('userid',$user)->delete();
        Auth::logout();
        Session::flush();
        return redirect()->route('user.index');
    }

  


}


