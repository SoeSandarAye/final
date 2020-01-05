<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Socialuser;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Friend;
use App\Addfriend;
use Illuminate\Support\Facades\Auth;

class PeopleknowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersid = Auth::user()->id;

        $usernames=Auth::user();

        $usersdetail=DB::table('socialusers')->where('userid',$usersid)->get();
        $username="Admin";
        
             $people=DB::table('users')
                    ->join('socialusers','users.id','=','socialusers.userid')
                    ->where('users.id','!=',$usersid)
                    ->where('users.name','!=',$username)
                    ->select('users.*','socialusers.photo')
                    ->get();
            return view('peopleknow.index',compact('people','usernames','usersdetail'));
          

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

      public function adddetails($id)
    {
        $addid=$id;
        $id = Auth::id();

        $addfriend=new Addfriend;
        $addfriend->userid=$id;
        $addfriend->addid=$addid;
        $addfriend->save();
        return redirect()->route('peopleknow.index');
    }
}
