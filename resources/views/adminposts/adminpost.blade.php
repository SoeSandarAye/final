@extends('adminfronttemplate')
@section('content')


<div class="container my-3">
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
       <!--  <div class="card-footer">
          <div class="border comment_area bg-white mb-2"></div>


          
      

          


            <div class="media-body pr-2 pb-2">
              <input type="hidden" id="user_id" value="{{$authid->id}}">
              <input type="hidden" id="post_id" value="{{$posts->id}}">
              <textarea class="form-control my-2" id="comment" style="height:40px;"></textarea>
              <button class="btn btn-sm btn-info btncomment" value="">Send</button>
            </div>
          </div> -->
          
          

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
  
 



