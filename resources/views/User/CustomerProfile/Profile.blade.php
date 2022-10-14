
@extends('User.master')
@section('title')

 	Customer Profile

@endsection

@section('content')
	
	
<!-- login-page -->


	<div class="login-page about">

		<img class="login-w3img" src="{{asset('FrontEndSourceFile')}}/images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Customer Profile</h3>  
			
				@error('email')
				
	                <span class="invalid-feedback " role="alert">
	                	<center>
	                	   	
	                	   		<h5> <strong style="color:red;">Error in updating profile <br>{{ $message }}</strong> </h5>
	                	   	
	                    </center>
	                </span>
	           
	            @enderror
			
		
			<div class="login-agileinfo"> 
 				<div class="wthreelogin-text">
						<center>
		                  <img class="profile-user-img img-fluid img-circle"
		                      src="{{asset('/BackEndSourceFile')}}/dist/img/user4-128x128.jpg"
		                       alt="User profile picture"> 
		                 </center><br>

		                <h3 class="profile-username text-center">{{$CustomerProfile -> name}}</h3>
			            <p class="text-muted text-center"><b>Administator</b></p> <br> <br>
		      
		           		
		           		<h4><b>Name:</b> {{$CustomerProfile -> name}} {{$CustomerProfile -> middlename}} {{$CustomerProfile -> lastname}}  </h4><hr>
		              	<h4><b>Email:</b> {{$CustomerProfile -> email}}  </h4><hr> 
		           	   
			          	<h4><b>Address:</b> {{$CustomerProfile -> address}} </h4><hr>
			        
			         
			          {{--   <button class="btn btn-info" style="float:right;" data-bs-toggle="modal" data-bs-target="#edit{{$CustomerProfile->id}}" data-bs-whatever="@fat">
			                    Edit Profile
			            </button> --}}



			          	<button class="btn btn-primary" data-toggle="modal" data-target="#profile{{$CustomerProfile -> id }}" style="outline: none; float: right;">
								Edit Profile
						</button>

						@if($CustomerProfile -> google_id == '')

							<a href="{{ route('view_of_changepassword') }}" type="button" class="btn btn-success">Change Password</a>
							
						@endif
						


						<br>

					    <!-- modal --> 
						<div class="modal video-modal fade" id="profile{{$CustomerProfile -> id }}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header text-center">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><br>
										<h3 class="modal-title w-100" style="margin-top: 5px;">Edit Customer Profile</h3>						
									</div>
							
										<div class="modal-body">
										    <form action="{{ route('customer_update') }}" method="POST" onsubmit="btn.disabled = true; return true;">

										    	@csrf

										    	<input type="hidden" class="form-control"  name="id" value="{{$CustomerProfile -> id}}">
										      
										      	<input class="agile-ltext" type="text" name="name" placeholder="Enter your First Name" required>
	   	
										      	<input class="agile-ltext" type="text" name="middlename" placeholder="Enter your Middle Name" required>
				  									      	
										      	<input class="agile-ltext" type="text" name="lastname" placeholder="Enter your Last Name" required>

										      	<input class="agile-ltext" type="text" name="address" placeholder="Address" required>

										      	<input class="agile-ltext @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="New Email">

										      	 

										      	<div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="submit" name="btn" class="btn btn-primary">Save changes</button>
											    </div>
				  							    
										      </div>
											  
											</form>
										</div>
								
								</div>
							</div>
						</div> 
					   <!-- //modal -->


						</div>
		

		         </div>
			</div>	 
		</div>
	</div>

@endsection