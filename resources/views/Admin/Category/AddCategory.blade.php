@extends('Admin.master')
@section('title')

	Category Page

@endsection
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
 <div class="container">
 	<div class="row">
 		<div class="offset-3 col-md-5 my-lg-5">

 			@if(Session::get('sms'))

 			<div class="alert alert-warning alert-dismissible fade show" role="alert">
 				<strong> {{session::get('sms')}}</strong>
 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 					<span aria-hiddden="true">&times;</span>
 				</button>
 			</div>

 			@endif

 			<div class="card">
 				<div class="card-header text-center" >
 					<h3>Category</h3>
 				</div>
 				<div class="card-body">

 					<form action="{{route('cate_save')}}" method="post">
 						@csrf
 						
 						<div class="form-group">
	 						<label> Category Name</label>
	 						<input type="text" class="form-control" name="category_name">
 					    </div>

 					    <div class="form-group">
	 						<label> Order Number</label>
	 						<input type="text" class="form-control" name="order_number">
 					    </div>

 					    <div class="form-group">
	 						<label> Added On</label>
	 						<input type="date" class="form-control" name="added_on">
 					    </div>

 					    <div class="form-group">
	 						<label> Category Status</label>

	 						<div class="radio">
	 							<input type="radio" name="category_status" value="1" required>Active
	 							<input type="radio" name="category_status" value="0" required>Inactive
	 						</div>
	 					
 					    </div>
 					    <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Category Add</button>

 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>


@endsection