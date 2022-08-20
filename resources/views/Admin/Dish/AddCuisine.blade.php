@extends('Admin.master')
@section('title')

 Add Cuisine


@endsection

@section('content')

 <div class="container">
 	<div class="row">
 		<div class="offset-2 col-md-8 my-lg-5">

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
 					<h3>Add Cuisine</h3>
 				</div>
 				<div class="card-body">

 					<form action="{{route('save_dish_data')}}" method="post" enctype="multipart/form-data">
 						@csrf
 						
 						<div class="form-group ">
	 						<label>Cuisine Name</label>
	 						<input type="text" class="form-control" name="dish_name" required>
 					    </div>
 					    	
 					    <div class="form-group">
	 						<label> Category Name</label>

	 						<select name="category_id" class="form-control">


	 							<option>------Select Category-----</option>

	 							@foreach($categories as $cate)

	 								<option value="{{$cate->category_id}}"> {{$cate->category_name}}</option>

	 							@endforeach
	 						</select>
 					    </div>


 					    <div class="form-group">
	 						<label> Detail</label>
	 						
	 						<textarea type="text" name="dish_detail" class="form-control" rows="5"></textarea>
 					    </div>

 					     <div class="form-group">
	 						<label> Cuisine Image</label>
	 						<input type="file" class="form-control" name="dish_image" accept="image/*">
	 						
 					    </div>


 					    
 					    <div class="form-group">
	 						<label> Status</label>

	 						<div class="radio">
	 							<input type="radio" name="dish_status" value="1" required>Active
	 							<input type="radio" name="dish_status" value="0" required>Inactive
	 						</div>
	 						
 					    </div>


 					 	<div class="card">
 					 		<div class="card-header">Cuisine Attribute</div>
 					 	</div>
 					 	<div class="card-body">
 					 		<div class="form-group">
 					 			<div class="row">
 					 				<div class="col-md-1 ">
 					 					<label>Price</label>
 					 				</div>

 					 				<div class="col-md-3">
 					 					<input type="number" step="any" min="0" max="1000" name="full_price" placeholder="Full Price">
 					 				</div>
 					 			</div>
 					 		</div>
 					 	</div>
 					   
 					    <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Cuisine Add</button>

 					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>


@endsection