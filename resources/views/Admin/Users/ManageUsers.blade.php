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
/*#example1 th{
  text-align: center;
}*/

/*#example1 td{
  text-align: center;
}*/
/*#add_user{
  font-family: poppins;
}*/
</style>



  {{-- @if(Session::get('added_msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> {{session::get('added_msg')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hiddden="true">&times;</span>
        </button>
      </div>
  @endif --}}
  
      <div class="card my-5">
          <div class="card-header">
            <h3 class="card-title" id ="add_user"><b>Manage User</b></h3>
                <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat" id="add_user">
                   Add Staff 
                </button>
          </div>   
        
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">

              <!-- add user modal -->
               <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="add">Add New Staff</h5>
                       <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                      </div>
                      <div class="modal-body">
                        <form action="{{route('save_user')}}" method="post">

                             @csrf

                            <div class="form-group">
                              <label> First Name</label>
                              <input type="text" class="form-control" name="name" 
                                     placeholder="Enter First Name" 
                                     pattern="[A-Za-z \s*]+$"
                                     oninvalid="this.setCustomValidity('Letters only are Allowed and also this is required to fill up')"
                                     oninput="this.setCustomValidity('')" 
                                     required>
                            </div>

                            <div class="form-group">
                              <label> Middle Name</label>
                              <input type="text" class="form-control" name="middlename"
                                     placeholder="Enter Middle Name" 
                                     pattern="[A-Za-z \s*]+$"
                                     oninvalid="this.setCustomValidity('Letters only are Allowed and also this is required to fill up')"
                                     oninput="this.setCustomValidity('')" 
                                     required>
                            </div>

                            <div class="form-group">
                              <label> Last Name</label>
                              <input type="text" class="form-control" name="lastname"
                                     placeholder="Enter Last Name" 
                                     pattern="[A-Za-z \s*]+$"
                                     oninvalid="this.setCustomValidity('Letters only are Allowed and also this is required to fill up')"
                                     oninput="this.setCustomValidity('')" 
                                     required>
                            </div>

                            <div class="form-group">
                              <label> Address</label>
                              <input type="text" class="form-control" name="address"
                                     placeholder="Enter Address" 
                                     required>
                            </div>

                            <div class="form-group">
                              <label> Email</label>
                              <input type="email" class="form-control" name="email"
                                     placeholder="Enter Your Email Address">
                            </div>

                           <!--  <div class="form-group">
                              <label> Role</label>
                              <div class="radio">
                                <input type="radio" name="role" value="1" required> Admin 
                                <input type="radio" name="role" value="2" required> Staff
                              </div>
                             </div> -->

                            <div class="form-group">
                              <label> Password</label>
                              <input type="Password" class="form-control" name="password" 
                                     placeholder="Enter Password" 
                                     required>
                            </div>

                            <div class="form-group">
                              <label> Confirm Password </label>
                              <input type="Password" class="form-control" name=" password_confirmation"
                                     placeholder="Confirm your Password" 
                                     required>
                            </div>
              
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button> 
                              <button type="submit" name="btn" class="btn btn-primary ">Submit</button>
                            </div>

                        </form>
                     </div>
                   </div>
                 </div>
               </div>
               
                  <!-- end of user modal -->

              <thead>
              <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Logged in Using</th>
                <th>Role</th>        
                <th>Created at</th>
              </tr>
              </thead>
              <tbody>
              
            	@php($i = 1)
            	@foreach($users  as $user)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>
                <td>

                   @if($user->address == null)

                        N/A
                        
                    @else
                      {{$user->name}}

                    @endif
                    
                </td>
                
                <td>{{$user -> email}}</td>
                
                <td>

                    @if($user -> google_id)
                       Google Account
                    @else
                       Nick's Resto Bar System 
                    @endif

                </td >

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

                </tr>
          
              @endforeach
              
              </tbody>
            </table>
          </div>
      </div>
            

@endsection
