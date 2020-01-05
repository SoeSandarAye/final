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
<div class="container" style="margin-top: 100px">
  <div class="row"> 
   
    <div class="offset-md-1 col-md-10 bg-white shadow">
      <div class="row">
        <div class="col-md-3 bg-secondary" style="padding-top: 160px;">
            @foreach($userdetails as $userdetail)
        
      <p class="w3-center"><img src="{{$userdetail->photo}}" class="w3-circle" style="height:106px;width:106px" ></p>
      <h4 class="w3-center text-white">{{$usernames->name}}</h4>
      @endforeach
        </div>
        <div class="col-md-9 py-5">
            <h4 class="text-center font-weight-bold"><i class="fas fa-user-edit"></i>Update Profile</h4><hr>
     
       @if (session()->has('message'))
      <div class="alert alert-success">
        {{ session('message') }}
      </div>
      @endif
      
      
      <form method="POST" action="{{route('updateprofile.update',$usernames->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @foreach($userdetails as $userdetail)

        <div class="form-group">

         
          <label for="formGroupExampleInput">Name</label>
          <input type="text" class="form-control" id="formGroupExampleInput" value="{{$usernames->name}}" name="name">
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Phone</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="{{$userdetail->phone}}" name="phone">
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Address</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" value="{{$userdetail->address}}" name="address">
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput2">Date Of Birth</label>
          <input type="Date" class="form-control" id="formGroupExampleInput2" value="{{$userdetail->dob}}" name="dob">
        </div>
         <div class="form-group py-2">

            <input type="file" name="photo" class="form-control-user">
            {{--<img src="{{asset($userdetail->photo)}}" class="img-fluid">--}}
            <input type="hidden" name="oldprofile" value="{{$userdetail->photo}}">
          </div>
          <div class="row">

            <div class="offset-md-9 col-md-3">
              <button type="submit" class="btn btn-primary" style="background-color: #4d636f"><i class="fas fa-user-edit"></i>Update Profile</button>
            </div>
          </div>
          @endforeach
      </form>
      
    </div>
    
        </div>
      </div>
  <div class="form-group">






    </div>
  </div>
</div>


@endsection