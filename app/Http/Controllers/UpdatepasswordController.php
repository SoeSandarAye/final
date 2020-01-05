<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\MessageBag;
use Session;

class UpdatepasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usernames=Auth::user();

        $userdetails=DB::table('socialusers')->where('userid',$usernames->id)->get();
        return view('updatepassword.updatepassword',compact('usernames','userdetails'));
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
        $user=Auth::user();
        $original_password=$user->password;
        $update_query = User::find($id);
        $newpassword=request('oldpass');
        $updatepassword=request('newpass');
        if (Hash::check($newpassword,$original_password)) {
            $update_query->password=Hash::make($updatepassword);
            $update_query->update();   
            session()->flash('message', 'Successfully Updated!');
            return redirect()->route('updatepassword.index');
        }
        else
        {
            $errors = new MessageBag(['oldpass'=>['Old password do not match']]);
            return Redirect::back()->withErrors($errors);
           // return redirect()->route('updatepassword.index');
        }
      

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
