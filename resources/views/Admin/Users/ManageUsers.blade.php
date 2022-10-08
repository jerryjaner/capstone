@extends('Admin.master')
@section('title')

	Manage User

@endsection
@section('content')




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


{{-- 
  @if(Session::get('email'))
      
  @endif --}}

  @error('email')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Error in Creating Staff! <br>{{ $message }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hiddden="true">&times;</span>
        </button>
      </div>
  @enderror


  
      <div class="card my-2">
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
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="add">Add New Staff</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{route('save_user')}}" method="post" onsubmit="btn.disabled = true; return true;">

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
                              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>  --}}
                             {{--  <button class="btn btn-primary" type="submit" name="btn" id="submit" onclick="loading()" >
                               <i class="fas fa-spinner fa-spin" style="display: none;"></i><span class="btn-text">Submit</span>
                              </button> --}}
                              <button class="btn btn-primary" type="submit" name="btn">Submit</button>
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
                      {{$user->address}}

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

                        <p class="text-center">
                         <span class="badge badge-info">Admin</span>
                        </p>

                      @elseif($user ->role == 2)

                        <p class="text-center">
                         <span class="badge badge-secondary">Staff</span>
                        </p>

                      @else
                        <p class="text-center">
                         <span class="badge badge-warning">Customer</span>
                        </p>
                      @endif
                      
                </td>
                
                {{-- <td>{{ \Carbon\Carbon::parse($user -> created_at)->diffForHumans() }}</td> --}}
                <td>{{\Carbon\Carbon::parse($user->created_at)->Format('m-d-Y')}}</td>

                </tr>
          
              @endforeach
              
              </tbody>
            </table>
          </div>
      </div>
            

@endsection
