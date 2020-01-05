<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentstoreController extends Controller
{
     	$comment=$request->comments;
        $userid=$request->userids;
        $postid=$request->postids;
        $commentsave=new Comment;
        $commentsave->userid=$userid;
        $commentsave->postid=$postid;
        $commentsave->comment=$comment;
        $commentsave->save();
}
