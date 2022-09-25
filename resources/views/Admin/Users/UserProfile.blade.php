@extends('Admin.master')
@section('title')

	 Admin Profile

@endsection
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
	            <!-- About Me Box -->
	            <div class="card card-primary">
	              <div class="card-body box-profile">
	                <div class="text-center">
	                  <img class="profile-user-img img-fluid img-circle"
	                      src="{{asset('/BackEndSourceFile')}}/dist/img/user4-128x128.jpg"
	                       alt="User profile picture">
	                </div>

	                
	              {{--   @foreach($users as $admin) --}}

	               {{--  @if($admin -> role == '1') --}}
		             <h3 class="profile-username text-center">{{$admin -> name}} {{$admin->middlename}} {{$admin->lastname}}</h3>
		             <p class="text-muted text-center">Administator</p>  
	              </div>

	              <!-- /.card-header -->
		              <div class="card-body">
		              	 <i class="fas fa-envelope mr-2"></i> {{$admin -> email}} <hr>
		           	   
			          	 <i class="fas fa-map-marker-alt mr-2"></i>{{$admin -> address}} <hr>
			        
			             <button class="btn btn-success btn-sm" style="float:right;" data-bs-toggle="modal" data-bs-target="#edit{{$admin->id}}" data-bs-whatever="@fat">Edit Profile</button>
		              </div>
		           {{--   @endif --}}

						<div class="modal fade" id="edit{{$admin -> id}}" tabindex="-1" aria-labelledby="edit{{$admin -> id}}" aria-hidden="true">
				            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				              <div class="modal-content">
				                <div class="modal-header text-center">
				                  <h5 class="modal-title w-100" id="edit{{$admin -> id}}">Update Profile</h5>
				                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				                </div>

				                <div class="modal-body">
	     
				                    <form class="row g-3" action="{{route('profile_update')}}" method="post" onsubmit="btn.disabled = true; return true;">

				                       @csrf
				                      <input type="hidden" class="form-control"  name="id" value="{{$admin -> id}}">

									  <div class="col-md-4">
									    <label for="First Name" class="form-label">First Name</label>
									    <input type="text" class="form-control" name="name" placeholder="First Name" required>
									  </div>
									   <div class="col-md-4">
									    <label for="Middle Name" class="form-label">Middle Name</label>
									    <input type="text" class="form-control" name="middlename" placeholder="Middle Name">
									  </div>
									  <div class="col-md-4">
									    <label for="Last Name" class="form-label">Last Name</label>
									    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
									  </div>
									  <div class="col-12">
									    <label for="address" class="form-label">Address</label>
									    <input type="text" class="form-control"  placeholder="1234 Main St" name="address" required>
									  </div>
									  
									  <div class="col-12">
				                        <button type="submit" name="btn" class="btn btn-primary float-right">Update Profile</button>
				                        {{-- <button id="userfont" type="button" class="btn btn-secondary float-right mr-1" data-bs-dismiss="modal">Close</button>  --}}
									  </div>
									</form>
				                </div>
				             </div>
				          </div>
				        </div>

		            {{--  @endforeach --}}
		           
		           
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	          </div>
	          <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
 </section>





@endsection