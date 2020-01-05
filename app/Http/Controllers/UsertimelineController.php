<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activeuser;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Like;

class UsertimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userid = Auth::user()->id;
        $username=Auth::user();

        $userdetails=DB::table('socialusers')->where('userid',$userid)->get();
     
        $users=DB::table('socialusers')->where('userid',$userid)->get();
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.userid')
            ->join('socialusers','socialusers.userid','=','posts.userid')
            ->where('posts.userid',$userid)
            ->select('posts.*', 'users.name','socialusers.photo as socialphoto')
            ->orderBy('posts.id', 'desc')
            ->get();
   
        $userpost=Auth::id();
        $collections = DB::table('likes')
                 ->join('posts','likes.postid','=','posts.id')
                 ->select(DB::raw('postid,count(postid) as postlike'))
                 ->groupBy('postid')
                 ->get();

        $userlikes=DB::table('likes')
                ->join('posts','likes.postid','=','posts.id')
                ->join('users','likes.userid','=','users.id')
                ->where('users.id',$userpost)
                ->select('posts.id')
                ->get();

       return view('usertimeline.usertimeline',compact('users','username','posts','userpost','userdetails','collections','userlikes'));
     
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
