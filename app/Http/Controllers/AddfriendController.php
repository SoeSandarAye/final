<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Addfriend;
use App\Friend;
use Illuminate\Support\Facades\DB;

class AddfriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        return 'hi';
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
        return "hi";
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

    public function add($id)
    {
        $addid=$id;
        $id = Auth::id();

        $addfriend=new Addfriend;
        $addfriend->userid=$id;
        $addfriend->addid=$addid;
        $addfriend->save();
        return redirect()->route('home');
    }


    public function confirm($id)
    {
        $friendid=$id;

        $authid = Auth::id();

        $addfriend=new Friend;
        $addfriend->userid=$authid;
        $addfriend->friendid=$friendid;
        $addfriend->save();

        
      


        $del=DB::table('addfriends')
             ->where('userid',$friendid)
             ->where('addid',$authid)->delete();
        return redirect()->route('home');

    }


    public function deleteuser($id)
    {
       
        $find=Addfriend::find($id);
        $find->delete();
        
        return redirect()->route('home');

    }

   


    
}
