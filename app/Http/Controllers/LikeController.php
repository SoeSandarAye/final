<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hi";
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

     public function storelike(Request $request)
    {


      $user = Auth::id();
      $postids=$request->id;
      $query=DB::table('likes')
            ->where('userid',$user)
            ->where('postid',$postids)
            ->get()->count();
      if ($query>0) {
           $del=DB::table('likes')
                ->where('userid',$user)
                ->where('postid',$postids)
                ->delete();
        }
        else{
            $data=new Like;
            $data->userid=$user;
            $data->postid=$request->id;
            $data->save();
        }
      
    }


 public function showlikes(Request $request)
    {


      $user = Auth::id();
      $postids=$request->id;
     $query=DB::table('likes')
            ->where('postid',$postids)
            ->get()->count();
        echo $query;
      
    }


}
