@extends('Admin.master')
@section('title')

	Manage User

@endsection
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>

<!-- for display mesage -->

            @if(Session::get('sms'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{session::get('sms')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

                <!-- End of Message -->

            @endif
          <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title">Manage User</h3>
                    <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat"> Add User  </button>
              </div>   
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">

                    <!-- add categories modal -->
                   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="add">Add user</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{route('save_user')}}" method="post">

                               @csrf

                              <div class="form-group">
                                <label> First Name</label>
                                <input type="text" class="form-control" name="name">
                              </div>

                              <div class="form-group">
                                <label> Middle Name</label>
                                <input type="text" class="form-control" name="middlename">
                              </div>

                              <div class="form-group">
                                <label> Last Name</label>
                                <input type="text" class="form-control" name="lastname">
                              </div>

                              <div class="form-group">
                                <label> Address</label>
                                <input type="text" class="form-control" name="address">
                              </div>

                              <div class="form-group">
                                <label> Email</label>
                                <input type="text" class="form-control" name="email">
                              </div>

                              <div class="form-group">
                                <label> Role</label>
                                <div class="radio">
                                  <input type="radio" name="role" value="1" required> Admin 
                                  <input type="radio" name="role" value="2" required> Staff
                                </div>
                               </div>

                              <div class="form-group">
                                <label> Password</label>
                                <input type="Password" class="form-control" name="password">
                              </div>

                              <div class="form-group">
                                <label> Confirm Password </label>
                                <input type="Password" class="form-control" name=" password_confirmation">
                              </div>
                             
                               
                                                  
                                <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                  <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Submit</button>
                                </div>
                                </form>
                             </div>
                      <!-- end of caategories modal -->
                  <thead>

                  <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  	@php($i = 1)
                  	@foreach($users  as $user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>
                    <td>{{$user -> address}}</td>
                    <td>{{$user -> email}}</td>
                    <td>
                          @if($user ->role == 1)

                                  Admin

                          @elseif($user ->role == 2)

                                  Staff

                          @else
                                  Customer
                          @endif
                          
                    </td>
                    <td>{{ \Carbon\Carbon::parse($user -> created_at)->diffForHumans() }}</td>
                    
                             <!-- <a type="button" class="btn btn-outline-dark"  data-toggle="modal" data-target="#edit">
                                  <i class="fas fa-edit"  title="click to Change it">  </i>
                               </a>
                             -->
                      <td>
                         <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="click to Change it">  </i>
                         </button>
                             
                          <a class="btn btn-outline-danger" href="">
                            <i class="fas fa-trash"  title="click to destroy">   </i>
                         </a>

                      </td>
                   </tr>
             
                      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="edit">Update Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="post" >
                            
                                 @csrf

                              <div class="form-group">
                                 <label>First Name:</label>
                                 <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                 <input type="hidden" class="form-control"  name="id" value="{{$user->id}}">
                              </div>
                              <div class="form-group">
                                 <label>Middle Name:</label>
                                 <input type="text" class="form-control" name="middlename" value="{{$user->middlename}}">
                              </div>
                              <div class="form-group">
                                 <label>Last Name:</label>
                                 <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
                              </div>
                              <div class="form-group">
                                 <label>Address</label>
                                 <input type="text" class="form-control" name="middlename" value="{{$user->address}}">
                              </div>


                             
                                  <div class="modal-footer">
                                
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                              </div>
                             


                  @endforeach
                  
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            

@endsection
