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
          @foreach($usersdetail as $user)
          <img src="{{$user->photo}}" width="30" height="30" class="rounded-circle">
          @endforeach
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="{{route('usertimeline.index')}}">
         {{$usernames->name}} &nbsp;&nbsp;|<span class="sr-only">(current)</span></a>
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

<div class=" w3-round w3-white" style="background-color: #f5f7f8">
	<div class="w3-container my-5" style="background-color: #f5f7f8">
		<h2 style="color: #4d636f" class="mt-5 text-center"><b>People You May Know</b></h2>
		<div class="row">
			@foreach($people as $peo)
			<div class="col-md-3 mt-5">
				<img src="{{$peo->photo}}" style='width:40%;margin-left: 30%' ><br><span style="margin-left: 42%">{{$peo->name}}</span>
	            <div class='w3-row'>
                    <div class='w3-center'>
                    <a href="people/add/{{$peo->id}}" class=' w3-button w3-block w3-section' style="width:70%;text-decoration: none;color:white;background-color: #4d636f;margin-left: 15%">Add friend</a>
                    </div> 
	            </div>
	        </div>
	        @endforeach
		</div>
	</div>
</div>


@endsection