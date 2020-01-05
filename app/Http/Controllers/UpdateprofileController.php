<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Socialuser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class UpdateprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=Auth::user()->id;
        $usernames=Auth::user();
        $userdetails=DB::table('socialusers')->where('userid',$userid)->get();
     
     
       return view('updateprofile.updateprofile',compact('usernames','userdetails'));
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
        $userid=$id;
        $usernames=Auth::user();
        $userdetails=DB::table('socialusers')->where('userid',$userid)->get();
     
     
       return view('updateprofile.updateprofile',compact('usernames','userdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

         $userid = Auth::user()->id;
        if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/profile/',$filename);  //storeAs or move

           $profile = '/profile/'.$filename;

        }else{
            $profile = request('oldprofile');
        }

        $user = User::find($id);
        $user->name= request('name');
        $user->update();

  
        $socialuser=Socialuser::find($id);
        
        $socialuser->phone = request('phone');
        $socialuser->address = request('address');
        $socialuser->dob = request('dob');
        $socialuser->photo = $profile;
        $socialuser->update();
       session()->flash('message', 'Successfully Updated!'); 
       return redirect()->route('updateprofile.index');
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
