<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
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
        // dd($request);

        if ($request->hasfile('photo')) {
            $photos = $request->file('photo');
            $fileAry=array();
            // $filename = time().'.'.$photo->getClientOriginalExtension();
            // $photo->move(public_path().'/postimage/',$filename);  //storeAs or move

            //  $profile = '/postimage/'.$filename;

            foreach ($photos as $photo) {
                $filename=uniqid().'_'.$photo->getClientOriginalName();
                array_push($fileAry, $filename);
                $photo->move(public_path().'/postimage',$filename);

            }
        }

        $id = Auth::id();
        $post = new Post;
        $post->title = request('title');
        $post->description = request('description');
        $post->photo = serialize($fileAry);
        $post->userid = $id;
        $post->save();

       
        return redirect()->route('home');




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

        
        $username=Auth::user();


        $post = Post::find($id);

        $userid = $post->userid;
        $usersdetail=DB::table('socialusers')->where('userid',$userid)->get();

        $users=DB::table('socialusers')->where('userid',$userid)->get();


        $usernames = DB::table('users')->where('id',$userid)->get();
       

       return view('posts.edit',compact('username','users','post','usernames','usersdetail'));
        //return view('posts.edit',compact('post'));
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
            $photos = $request->file('photo');
            $fileAry=array();
            foreach ($photos as $photo) {
                $filename=uniqid().'_'.$photo->getClientOriginalName();
                array_push($fileAry, $filename);
                $photo->move(public_path().'/postimage',$filename);

            }
        }
        else{
            foreach (unserialize($request->oldprofile) as $oldprof) {
                $fileAry[]=$oldprof;

            }
           
        }

      
        $post = Post::find($id);

        $post->title= request('title');
        $post->description = request('description');
        $post->photo = serialize($fileAry);
        $post->userid = $userid;
        $post->update();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function deletepost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('home');
    }

}
