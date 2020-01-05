

@extends('backendtemplate')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Post</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-header py-3">
              <div class="row">
                <div class="col-lg-9">
                   <h5 class="m-0 font-weight-bold" style="color: #4d636f">Post Lists</h5>
                </div>
              </div>
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>No</th>

                      <th>Title</th>
                      <th>Description</th>
                     
                      <th>Photo</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    @php

                       $i = 1;

                   @endphp
                   @foreach($posts as $post) 
                    <tr>
                  
                      <td>{{$i++}}</td>
                      <td>{{$post->title}}</td>
                     
                      <td>{{$post->description}}</td>
                      <td><img src="{{$post->photo}}" style="width:100px;height: 100px"> </td>

                      <td> 
                 
                
                       <a href="{{route('admincomment.show',$post->id)}}"><button type="submit" class="btn btn-success"  style="width:100px">Detail</button></a></td>
                       <td>
                         <form method="post" action="{{route('post.destroy',$post->id)}}">
            
                         @csrf
                         @method('DELETE') 
                          <input type="submit" name="btn" class="btn btn-danger w-100" value="Delete" onclick="return confirm('Are you sure want to delete?')">

                         </form>
                       </td>
                     
                    </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>




@endsection


