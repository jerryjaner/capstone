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

			<p class="w3ls-title w3ls-title1 text-center"> If You can change your Shipping Information</p>

			<div class="login-agileinfo"> 
				<form action="{{route('store_shipping')}}" method="post"> 


					@csrf
					
					<label> Full Name</label>
					<input class="agile-ltext" type="text" name="name" placeholder="Fullname"  value="{{$customer-> name}}  {{ Auth::user()->middlename }}. {{ Auth::user()->lastname }}" required>
				    <input type="hidden" class="form-control"  name="user_id" value="{{$customer->user_id}}">

					<label> Email</label>
					<input class="agile-ltext" type="email" name="email" placeholder="Your Email" value="{{$customer-> email}}" required>

					<label> Phone Number</label>
					<input class="agile-ltext" type="text" name="phone_no" min="0" maxlength="11" placeholder="Phone Number" required>			

					<label> Address</label>
					<input class="agile-ltext" type="text" name="address" placeholder="Enter Your Address" required>

				
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> 
									<span> I agree to the terms of service</span> 
								</label>  
							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="Sign Up">
				</form>
				
			</div>	 
		</div>
	</div>

	
@endsection