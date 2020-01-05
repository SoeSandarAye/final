

@extends('backendtemplate')

@section('content')

<h1 class="h3 mb-2 text-gray-800">Social-User </h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-header py-3">
              <div class="row">
                <div class="col-lg-9">
                   <h5 class="m-0 font-weight-bold" style="color: #4d636f" >Social-User Lists</h5>
                </div>
              </div>
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>No</th>

                      <th>Name</th>
                      <th>Email</th>
                     <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    @php

                       $i = 1;

                   @endphp
                   @foreach($users as $user) 
                    <tr>
                  
                      <td>{{$i++}}</td>
                      <td>{{$user->name}}</td>
                     
                      <td>{{$user->email}}</td>
                
                      
                      <td> 
                 
                
                       <a href="{{route('admintimeline.show',$user->id)}}"><button type="submit" class="btn btn-success"  style="width:100px">Detail</button></a></td>
                     
                    </tr>
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>




@endsection


