
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
			<div class="login-agileinfo"> 
 				<div class="wthreelogin-text"> 

					@foreach ($customers as $CustomerProfile)
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



			          	<button class="btn btn-info" data-toggle="modal" data-target="#myModal1" style="outline: none; float: right;">
								Edit Profile
						</button><br>

					    <!-- modal --> 
						<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
									</div>
									<section>
										<div class="modal-body">
									
											<div class="clearfix"> </div>
										</div>
									</section>
								</div>
							</div>
						</div> 
					   <!-- //modal -->
				
			        @endforeach

		         </div>
			</div>	 
		</div>
	</div>

@endsection