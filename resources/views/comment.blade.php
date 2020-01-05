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

<div class="container my-5">
  <div class="row">
    <div class="offset-3 col-md-6">
      <div class="card my-5">
        <div class="card-header bg-white"> 
         @foreach($users as $user)     
          <img src="{{$user->photo}}" width="30px" class="rounded-circle mr-1">
          @endforeach
          @foreach($usernames as $username)
          <b>{{$username->name}}</b>
           @endforeach       
        </div>
        <div class="card-body">
          <h6>{{$posts->title}}</h6>
          <p class="text-justify">
            {{$posts->description}}
          </p>
          <img src="{{$posts->photo}}" width="100%;">
        </div>
        <div class="card-footer">
          <div class="border comment_area bg-white mb-2"></div>


          
      

          


            <div class="media-body pr-2 pb-2">
              <input type="hidden" id="user_id" value="{{$authid->id}}">
              <input type="hidden" id="post_id" value="{{$posts->id}}">
              <textarea class="form-control my-2" id="comment" style="height:40px;"></textarea>
              <button class="btn btn-sm btn-info btncomment" value="">Send</button>
            </div>
          </div>
          
          

        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script type="text/javascript">  
 $(document).ready(function(){
    comment_refresh($('#post_id').val());
  console.log($('#post_id').val());
    $('.btncomment').click(function(){
      var comments=$('#comment').val();
      var userids=$('#user_id').val();
      var postids=$('#post_id').val();
    
      $.ajax({
        
          type:'POST',
          url:'{{route('comments.store')}}',
          data:{ _token:'{{csrf_token()}}', comment: comments,userid:userids,postid:postids}, 
          success:function (data) {
            $('#comment').val("");
          }
      });
    });
  });



 function comment_refresh($id)
  {
    var ids=2;
    setTimeout(function(){
      $('.comment_area').load('{{route('showcmt')}}');
      comment_refresh();
    },100);
  }
     

    </script>
@endsection
  
 



