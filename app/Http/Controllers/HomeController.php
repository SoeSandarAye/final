<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activeuser;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Like;
use App\Friend;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = Auth::user()->id;
        
        $username=Auth::user();

        $userdetails=DB::table('socialusers')->where('userid',$userid)->get();
     
        $users=DB::table('socialusers')->where('userid',$userid)->get();

        $usersdetail=DB::table('socialusers')->where('userid',$userid)->get();

        $friends = Friend::where('userid', $userid)->orWhere('friendid', $userid)->get();
        $friendscount = Friend::where('userid', $userid)->orWhere('friendid', $userid)->get()->count();
        
        $users = [];
        foreach ($friends as $user) {
            $users[] = $user->userid;
            $users[] = $user->friendid;
        }

        $user_array = array_unique($users);

        if ($friendscount==0) {
           $posts=Post::where('userid','=',$userid)->get();
        }
        else{

         $posts = Post::whereIn('userid', $user_array)
                ->orderBy('id','desc')
                ->get();   
        }

        
        
        
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

      //  return $posts;
       return view('index',compact('users','usersdetail','username','posts','userpost','userdetails','collections','userlikes'));



      
    }

  
//active now

     public function showall()
    {   
        $userid = Auth::user()->id;

        $actives=Activeuser::where('userid','!=',$userid)->where('userid','!=',6)->get();
        foreach ($actives as $active) {
            $id=$active->userid;
            $users = DB::table('users')->where('id',$id)->get();
            foreach ($users as $user) {
                //echo $user->name;
                $id=$user->id;
                $photos=DB::table('socialusers')->where('userid',$id)->get();
                foreach ($photos as $photo) {
                    $data="
                    <div class='row my-3'>
                        <div class='col-md-3'>
                             <img src='$photo->photo' alt='Avatar' style='width:50px;height:50px' class='rounded-circle'>
                        </div>
                        <div class='col-md-6 py-1'>
                             <span>$user->name</span>
                        </div>
                        <div class='col-md-2'>
                            <span class='badge badge-pill badge-success' style='font-size:5px'>&nbsp;</span>
                        </div>

                    </div>
               
                 
                
          ";

                echo $data;
                }
                
            }
            
        }
   
    }


    public function all(){
            $usersid = Auth::id();
      
            $people = DB::table('users')
            ->join('addfriends', 'addfriends.addid', '=', 'users.id')
            ->join('socialusers', 'socialusers.userid', '=', 'users.id')
            ->where('users.id', '!=', $usersid)
            ->select('users.*','socialusers.photo')
            ->get();

            echo $people;
    }   


    public function showpeople(){
        $usersid = Auth::user()->id;
        $username="Admin";
        
             $people=DB::table('users')
                    ->join('socialusers','users.id','=','socialusers.userid')
                    ->where('users.id','!=',$usersid)
                    ->where('users.name','!=',$username)
                    ->select('users.*','socialusers.photo')
                    ->get()->take(6);

            foreach ($people as $peo) {
                $data=" 
                    <div class='col-md-6'>
                         <img src='$peo->photo' style='width:50%' class='w3-circle'><br><span>$peo->name</span>
                    <div class='w3-row'>
                    <div class=''>
                    <a href='addfriend/$peo->id' class='w3-button w3-block w3-section' style='text-decoration:none;background-color:#4d636f;color:white'>Add friend</a>
                    </div>
                  
                    </div>
                    </div>
                   
                    ";
                    echo $data;
            }
             
        
    }


     public function showfriend(){

        $usersid = Auth::id();           

            $people =DB::table('addfriends')->where('addid',$usersid)->get();

            foreach ($people as $peo) {
                $idd=$peo->userid;
                $names=DB::table('users')->where('id',$idd)->get();
                $photos=DB::table('socialusers')->where('userid',$idd)->get();
                foreach ($names as $name) {
                    foreach ($photos as $photo) {
                          $data=" 
                    <img src='$photo->photo' style='width:50%'><br><span>$name->name</span>
                    <div class='w3-row'>
                   
                     <a href='confirm/$peo->userid' class='w3-button w3-block  w3-section' style='text-decoration:none;background-color:#4d636f;color:white'>Confirm friend</a>

                  
                   
                    <a href='delete/$peo->id' class='w3-button w3-block w3-section text-white' title='Decline' style='text-decoration:none;background-color:#820303'>Cancel</a>

                    </div>
                    ";
                    echo $data;
                    }
                   
                }
               
            }
             
        
    }
      public function post()
    {
        return redirect()->route('posts.index');
    }


}
