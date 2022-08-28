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
          <div class="col-md-4">
	  			

	            <!-- About Me Box -->
	            <div class="card card-primary">
	              <div class="card-body box-profile">
	                <div class="text-center">
	                  <img class="profile-user-img img-fluid img-circle"
	                      src="{{asset('/BackEndSourceFile')}}/dist/img/user4-128x128.jpg"
	                       alt="User profile picture">
	                </div>

	                @foreach($users as $admin)

	                @if($admin -> role == '1')
		             <h3 class="profile-username text-center">{{$admin -> name}} {{$admin->middlename}} {{$admin->lastname}}</h3>

		             <p class="text-muted text-center">Administator</p>  
	              </div>

	              <!-- /.card-header -->
		              <div class="card-body">
		                <strong><i class="far fa-envelope mr-1"></i>Email:  </strong>  {{$admin -> email}}
		                 <hr>
			            <strong><i class="fas fa-map-marker-alt mr-1"></i>Location: </strong>  {{$admin -> address}} 
			             <hr>
			            <strong><i class="fas fa-phone mr-1"></i>Phone:</strong> 09876543211
			             <hr>
			             <button class="btn btn-success btn-sm" style="float:right;">Edit Profile</button>
		              </div>
		             @endif
		             @endforeach
		           
		           
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