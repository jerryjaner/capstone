@extends('User.master')
@section('title')

	Shipping

@endsection

@section('content')

	<!-- Shipping page -->
<div class="login-page about">
		<img class="login-w3img" src="{{asset('FrontEndSourceFile')}}/images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Enter Your Shipping Information</h3>  

			<p class="w3ls-title w3ls-title1 text-center"> Please Fill up valid Shipping Information</p>

			<div class="login-agileinfo"> 
				<form action="{{route('store_shipping')}}" method="post" onsubmit="btn.disabled = true; return true;"> 


					@csrf
					
				<!-- 	<label> Full Name</label> -->
					<input class="agile-ltext" type="text" name="name" placeholder="Enter your FullName" required>
				    <input type="hidden" class="form-control"  name="user_id" value="{{$customer->user_id}}">

				<!-- 	<label> Email</label> -->
					<input class="agile-ltext" type="email" name="email" placeholder="Enter your Email" required>

					<!-- <label> Phone Number</label> -->
					<input class="agile-ltext" type="text" name="phone_no" min="0" maxlength="11" placeholder="Phone Number" required>			

					<!-- <label> Address</label> -->
					<input class="agile-ltext" type="text" name="address" placeholder="Enter Your Address" required>

				
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox">
									<input type="checkbox" name="checkbox" required><i></i> 
									<!-- <span> I agree to the terms of service</span>  -->
								
									<a href="#" data-toggle="modal" data-target="#myModal1" style="text-decoration: none;">
										 I agree to the terms of service
									</a>

									<!-- modal --> 
									<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
												</div>
												<section>
													<div class="modal-body">
													  terms and condition
														<div class="clearfix"> </div>
													</div>
												</section>
											</div>
										</div>
									</div> 
								<!-- //modal -->
				
								</label>  


							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="Submit" name="btn">
				</form>
				
			</div>	 
		</div>
	</div>

	
@endsection