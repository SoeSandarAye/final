<!DOCTYPE html>
<html>
<title>24-7 Social Media</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/336ce83557.js" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">



<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">



<!-- Navbar -->







{{--
<div class="w3-top">
<form method="post" action="{{route('logouts')}}">
  @csrf
  

  
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large" >

   <a href="{{route('usertimeline.index')}}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="My Timeline" style="font-size: 15px"><i class="fa fa-user">My Account</i></a>

  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  
  <a href="/home" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News" style="font-size: 15px"><i class="fa fa-globe" >Home</i></a>
  <a href="/peopleknow/" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Find Friends" style="font-size: 15px"><i class="fa fa-user">Users</i></a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope">Messages</i></a>
 
 <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  

     <button class="btn btn-outline-none w3-bar-item  w3-hide-small w3-padding-large text-white  w3-right" type="submit"><i class="fas fa-sign-out-alt">Logout</i></button>
 </div>
 </form>
</div>
--}}
<!-- Navbar on small screens -->
{{--<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>
--}}
<!-- Page Container -->
@yield('content')
<br>
 
<script>
// Accordion
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@yield('script')
</body>
</html> 
