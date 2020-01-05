<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         print_r(Session::get('postid'));
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
        $commentsave=new Comment;
        $postid=$request->postid;
        $commentsave->userid=$request->userid;
        $commentsave->postid=$request->postid;
        $commentsave->comment=$request->comment;
        $commentsave->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $username=Auth::user();
        $userdetails=DB::table('socialusers')->where('userid',$username->id)->get();

        $posts = Post::find($id);

        $userid = $posts->userid;
        $authid=Auth::user();

        $users=DB::table('socialusers')->where('userid',$userid)->get();


        $usernames = DB::table('users')->where('id',$userid)->get();
       
         Session::put('postid',$id); 
       //  echo $posts;
       return view('comment',compact('users','posts','usernames','authid','username','userdetails'));
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

    public function showcomment()
    {
       $postidd=Session::get('postid');
       $showall=DB::table('comments')
                ->join('users','users.id','=','comments.userid')
                ->join('socialusers','socialusers.userid','=','users.id')
                ->where('comments.postid',$postidd)
                ->select('comments.*','users.name','socialusers.photo')
                ->orderBy('comments.id','asc')
                ->get();
        // echo $showall;
        foreach ($showall as $show) {
            $data="<div class='media my-2'>
            <div class='media-left'>
              <img src='$show->photo' class='media-object rounded-circle m-2' style='width:35px'>
            
            </div>
            <div class='media-body pr-2 pb-2'>
              <small class='font-weight-bold text-muted'>$show->name</small><br>
              <small class='font-italic text-muted text-justify'>$show->comment</small>
            </div>
          </div>
        </div>";
        echo $data;
        }
           
    }
}
