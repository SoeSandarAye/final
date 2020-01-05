@extends('frontendtemplate')
@section('content')



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:#4d636f;">
  <div class="container">
  <a class="navbar-brand" href="#">
    <img src="{{asset('logo/logo.png')}}" width="30" height="30">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" required type="text" name="name" placeholder="Search" aria-label="Search">
    
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link ml-5" href="#">
          @foreach($userdetails as $user)
          <img src="{{$user->photo}}" width="30" height="30" class="rounded-circle">
          @endforeach
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('usertimeline.index')}}">
         {{$username->name}} &nbsp;&nbsp;|<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="/home"><i class="fas fa-home"></i>Home<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link text-white" href="/peopleknow/">|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-ninja"></i>&nbsp;Find Friends&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<span class="sr-only">(current)</span></a>
      </li>

      <form action="{{route('logouts')}}" method="post">
        @csrf

        <div class="dropdown">
  <button class="btn btn-outline-none dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <i class="fas fa-user-cog" style="color: white"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
   <button type="submit" class="btn btn-outline-none text-dark"><i class="fas fa-sign-out-alt"></i>Logout</button>
  </div>
</div>
    
      </form>
      

    </ul>

  </div>

</div>
</nav>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          
         @foreach($users as $user)
         @foreach($userdetails as $userdetail)
         <div class="row">
          <div class="col-md-10">
            
          </div>
          <div class="col-md-2">
            <div class="dropdown">
             
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-cog" style="color: black"></i>
             </a>

             <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              
              <a class="dropdown-item" href="updateprofile/{{$username->id}}" style="font-size: 12px"><i class="fas fa-tools"></i>&nbsp;&nbsp;Update Profile</a>
              <a class="dropdown-item" href="updatepassword" style="font-size: 12px"><i class="fas fa-tools"></i>&nbsp;&nbsp;Change Password</a>
            </div>
          </div>
        </div>
      </div>
      
      <h4 class="w3-center">{{$username->name}}


      </h4>
      <p class="w3-center"><img src="{{$user->photo}}" class="w3-circle" style="height:106px;width:106px" ></p>
      
      
      
      <hr>
      <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>{{$userdetail->phone}}</p>
      <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> {{$userdetail->address}}</p>
      <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> {{$userdetail->dob}}</p>
    </div>
    @endforeach
    @endforeach
  </div>
  <br>
  
  <!-- Accordion -->
  {{--  <div class="w3-card w3-round">
    <div class="w3-white">
      <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
      <div id="Demo1" class="w3-hide w3-container">
        <p>Some text..</p>
      </div>
      <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
      <div id="Demo2" class="w3-hide w3-container">
        <p>Some other text..</p>
      </div>
      <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
      <div id="Demo3" class="w3-hide w3-container">
       <div class="w3-row-padding">
         <br>
         <div class="w3-half">
           <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
         <div class="w3-half">
           <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
         <div class="w3-half">
           <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
         <div class="w3-half">
           <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
         <div class="w3-half">
           <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
         <div class="w3-half">
           <img src="/w3images/snow.jpg" style="width:100%" class="w3-margin-bottom">
         </div>
       </div>
     </div>
   </div>      
 </div>
 <br>
 --}}

 
 
 
 <!-- End Left Column -->
</div>

<!-- Middle Column -->
<div class="w3-col m7">
  
  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card w3-round w3-white">
        <div class="w3-container w3-padding">
          <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group py-2">
             <input type="text" name="title" class="form-control" placeholder="Post Title">
           </div>
           <div class="form-group py-2">
             
             <textarea class="form-control" placeholder="What's on your mind?" name="description"></textarea>
           </div>
           <div class="row">
             <div class="col-lg-10">
               <div class="form-group py-2">
                 
                <input type="file" class="form-control-suer" name="photo[]" multiple>
                
              </div>
              
            </div>
            <div class="col-lg-2 py-2">
              <button type="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
            </div>

          </div>
          
        </form>
        
        
      </div>
    </div>
  </div>
</div>











@foreach($posts as $post)

@if($post->userid==$userpost)

<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
  <img src="{{$post->socialphoto}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
  <span class="w3-right"> 
  <div class="dropdown">
          <button class="btn btn-outline-none dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-sliders-h"></i>
          </button>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a href="{{route('posts.edit',$post->id)}}" class="d-block"><button class=" btn btn-outline-none"><i class="fas fa-cogs" style="color:#4d636f"></i>Edit Post</button></a>&nbsp;&nbsp;
          <a href="deletepost/{{$post->id}}" class="d-block"><button class=" btn btn-outline-none"><i class="far fa-trash-alt" style="color:#4d636f"></i>Delete Post</button></a>&nbsp;&nbsp;

          <button class="speech d-block btn btn-outline-none" value="{{$post->description}}"><i class="fas fa-volume-up" style="color:#4d636f"></i>Read Post</button>&nbsp;&nbsp;
          <button class="speechcancel d-block btn btn-outline-none"><i class="fas fa-stop-circle" style="color: #4d636f"></i>Stop Reading</button>
          </div>
          </div>
  </span>
  <h4>{{$post->name}}</h4><br>
  <hr class="w3-clear">
  <b>{{$post->title}}</b>
  <p>{{$post->description}}</p>
 


<div id="carouselExampleControls" class="carousel slide my-2" data-ride="carousel">
  <div class="carousel-inner">
     @foreach(unserialize($post->photo) as $phot)

     @if($loop->first)
    <div class="carousel-item active">
      <img src="{{asset('postimage/'.unserialize($post->photo)[0])}}" style="height: 500px" class="d-block w-100" alt="...">
    </div>
   @else
    <div class="carousel-item">
      <img src="{{asset('postimage/'.$phot)}}" style="width: 100%;height: 500px" class="d-block w-100" alt="...">
    </div>
    @endif
     @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       
       

  @foreach($collections as $collection)
  @if($collection->postid==$post->id)

  
  <span class="mr-2 badge badge-pill badge-danger" id="show_likes{{$post->id}}">{{$collection->postlike}}</span>


  @endif

  @endforeach


  @php

  $like= App\Like::all()->where('userid',$userpost)->where('postid',$post->id);
  
  @endphp
  
  @if($like->count()>0)
  <button type="button" value="{{$post->id}}" class="w3-button w3-theme-d1 w3-margin-bottom unlike"><i class="fa fa-thumbs-up"></i> Unlike</button>
  
  @else
  <button type="button" value="{{$post->id}}" class="w3-button w3-theme-d1 w3-margin-bottom like"><i class="fa fa-thumbs-up"></i> like</button>
  @endif
  <a href="{{route('comments.show',$post->id)}}"><button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment btncomment"></i>Comments</button> </a>
  <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fas fa-share-alt"></i> Share</button> 
</div> 



@else
<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
  <img src="{{$post->socialphoto}}" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
  <span class="w3-right w3-opacity">        
  </span>
  <h4>{{$post->name}}</h4><br>
  <hr class="w3-clear">
  <b>{{$post->title}}</b>
  <p>{{$post->description}}</p>
  <img src="{{$post->photo}}" style="width:100%" class="w3-margin-bottom">
  
  @foreach($collections as $collection)
  @if($collection->postid==$post->id)

  
  <span class="mr-2 badge badge-pill badge-danger" id="show_likes{{$post->id}}">{{$collection->postlike}}</span>

  @endif

  @endforeach
  @php

  $like= App\Like::all()->where('userid',$userpost)->where('postid',$post->id);
  
  @endphp


  @if($like->count()>0)
  <button type="button" value="{{$post->id}}" class="w3-button w3-theme-d1 w3-margin-bottom unlike"><i class="fa fa-thumbs-up"></i> Unlike</button>
  
  @else
  <button type="button" value="{{$post->id}}" class="w3-button w3-theme-d1 w3-margin-bottom like"><i class="fa fa-thumbs-up"></i> like</button>
  @endif
  <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
  <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fas fa-share-alt"></i> Share</button> 
</div> 
@endif
@endforeach

<!-- End Middle Column -->
</div>


<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>


@endsection
@section('script')

<script type="text/javascript">
  
  $(document).ready(function () {
    $('.speech').click(function () {
      var text=$(this).val();
      var utterance= new SpeechSynthesisUtterance(text);
      speechSynthesis.speak(utterance);
    })
    $('.speechcancel').click(function () {
      window.speechSynthesis.cancel();
    })
  })


  $(document).ready(function(){
    
    $('.like').click(function () {
     var id=$(this).val();
     $(this).toggleClass('like');
     if($(this).hasClass('like')){
      $(this).html('<i class="fa fa-thumbs-up"></i>Like'); 
    } else {
      $(this).html('<i class="fa fa-thumbs-up"></i>Unlike');
      $(this).addClass("unlike"); 
    }
    $.ajax({
      type: 'POST',
      url: '{{route('storelike')}}',
      data: { _token:'{{csrf_token()}}',id : id },
      success: function(){
        showLike(id);
      }
    });
  })
    
    


    $('.unlike').click(function () {
      var id=$(this).val();
      $(this).toggleClass('unlike');
      if($(this).hasClass('unlike')){
        $(this).html('<i class="fa fa-thumbs-up"></i>Unlike'); 
      } else {
        $(this).html('<i class="fa fa-thumbs-up"></i>Like');
        $(this).addClass("like"); 
      }
      $.ajax({
        type: 'POST',
        url: '{{route('storelike')}}',
        data: { _token:'{{csrf_token()}}',id : id },
        success: function(){
          showLike(id);
        }
      });
    })
    
    
    
  });

  
  function showLike(id){
    $.ajax({
      url: '{{route('showlikes')}}',
      type: 'POST',
      data: { _token:'{{csrf_token()}}',id : id },
      success: function(data){
        $('#show_likes'+id).html(data);
        
      }
    });
  }
</script>
@endsection