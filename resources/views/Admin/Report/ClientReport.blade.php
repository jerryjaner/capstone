@extends('Admin.master')
@section('title')

Report of Customer
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
                <h3 class="card-title">Report of Customer</h3>
               <!--     <button type="button" class="btn btn-success btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat"> Add User  </button> -->
 
                    <a href="{{route('download_client')}}"  class="btn btn-info btn-sm" style="float: right;">Print Report</a>
              </div>

                     
                    

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">


    
                
                  <thead>

                  <tr>

                    <th>SL</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Role</th>
                   
                    
         
                   <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    
                  	@php($i = 1)
                  	@foreach($users  as $user)
                    @if($user -> role == 0)
                  <tr>
                    <td>{{$i++}}</td>


                    
                    <td>{{$user->name}}</td>
                    <td>{{$user->middlename}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user -> email}}</td>
                    <td>
                         
                                  Customer
                             
                    </td>
                   
                  
                   @endif
                             
                             <!-- <a type="button" class="btn btn-outline-dark"  data-toggle="modal" data-target="#edit">
                                  <i class="fas fa-edit"  title="click to Change it">  </i>
                               </a>
                             -->
                <!--       <td>
                              <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@fat">
                                  <i class="fas fa-edit"  title="click to Change it">  </i>
                             </button>
                             
                                <a class="btn btn-outline-danger" href="">
                                  <i class="fas fa-trash"  title="click to destroy">   </i>
                               </a>

                          </td> -->
                   </tr>
             

                  @endforeach
                  
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            

@endsection
