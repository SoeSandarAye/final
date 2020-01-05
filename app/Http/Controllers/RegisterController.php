<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socialuser;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('userlogin.userregister');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed|min:8',
            'password_confirmation'=>'required|min:8',
            'dob'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'photo'=>'required',]);

        $user=new User;
        $user->name=request('name');
        $user->email=request('email');     
        $pass=request('password');
        $user->password=Hash::make($pass);
        $user->save();

            if ($request->hasfile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/profile/',$filename);  //storeAs or move

           $profile = '/profile/'.$filename;

        }
        $status='notban';
        $socialuser=new Socialuser;
        $socialuser->userid=$user->id;
        $socialuser->phone=request('phone');
        $socialuser->photo=$profile;
        $socialuser->status=$status;
        $socialuser->dob=request('dob');
        $socialuser->gender=request('gender');
        $socialuser->address=request('address');
        
        $socialuser->save();
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
