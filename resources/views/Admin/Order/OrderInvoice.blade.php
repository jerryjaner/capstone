 @extends('Admin.master')
@section('title')

   Order Invoice

@endsection
@section('content')
	
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

					body {
					  /*  background-color: blue; */
					    font-family: 'Calibri', sans-serif !important;
					}

					.mt-100{
					  margin-top: 50px;
					}

					.mb-100{
					  margin-bottom: 50px;
					}

					.card{
					    border-radius:1px !important;
					}

					.card-header{
					    
					    background-color:#fff;
					}

					.card-header:first-child {
					    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
					}

					.btn-sm, .btn-group-sm>.btn {
					    padding: .25rem .5rem;
					    font-size: .765625rem;
					    line-height: 1.5;
					    border-radius: .2rem;
					}
					#invoicefont{
						font-family: poppins;
					}


		</style>
	</head>
	<body>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<div class="container-fluid mt-100 mb-100">
			<div id="ui-view">
				<div>
					
					<div class="card ">
						<div class="card-header"> 
						<a class="btn btn-info btn-sm" style="float: right;" href="{{route('download_invoice',['id'=>$order->id])}}" id="invoicefont">
   						     <b>Print / Download Invoice </b>
  			   			 </a>
						
							<!--- for the invoice -->
							
							<div class="pull-right">
							<!--  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-print mr-1"></i> Print</a>
							  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a> -->
							</div>
						</div>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-sm-4">
									<h5 class="mb-3" id="invoicefont"> <strong>From:</strong> </h5>
									<div id="invoicefont">Name: <strong>Nicks Resto Bar & Cafe Restaurant</strong></div>
									<div id="invoicefont">Address: Gadgaron Matnog Sorsogon</div>
									<div id="invoicefont">Email: Nicks@gmail.com</div>
									<div id="invoicefont">Phone: 09706677438</div>
								</div>

								<div class="col-sm-4">
									<h5 class="mb-3"  id="invoicefont"><strong>To:</strong></h5>
									<div  id="invoicefont">Name: <strong>{{$shipping -> name}}</strong></div>
								    <div  id="invoicefont">Address: {{$shipping -> address}}</div>
									<div  id="invoicefont">Email: {{$customer -> email}}</div>
									<div  id="invoicefont">Phone: {{$shipping -> phone_no}}</div>
								</div>

								<div class="col-sm-4">
									<h5 class="mb-3"  id="invoicefont"><strong>Details:</strong></h5>
									<div  id="invoicefont">Payment :
										
										@if($payment -> payment_type == 'Cash_on_Delivery')

										   <strong> Cash On Delivery </strong>

										@elseif($payment -> payment_type == 'Cash_on_Pickup')

										   <strong> Cash On Pickup </strong>
										   
										@endif
										      
									</div>
									<div  id="invoicefont">Date: {{\Carbon\Carbon::parse($payment -> created_at)->toFormattedDateString() }}</div>
								</div>
						</div>

						<div class="table-responsive-sm">
							<table class="table table-striped">
								<thead>
									<tr>
									<th id="invoicefont">#</th>
									<th id="invoicefont">Item</th>
									<th id="invoicefont">Quantity</th>
									<th id="invoicefont">Price</th>
									<th id="invoicefont">Total</th>
									</tr>
								</thead>
								<tbody>
									@php($i = 1)
									@php($sum = 0)
									@php($ship = 50)

									@foreach($OrderD as $orderdetail)
									<tr>
										<td  id="invoicefont" >{{$i++}}</td>
										<td  id="invoicefont">{{$orderdetail -> dish_name}}</td>	
										<td  id="invoicefont">{{$orderdetail -> dish_qty}}</td>
										<td  id="invoicefont">{{$orderdetail -> dish_price}}</td>
										<td  id="invoicefont">{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
									</tr>
									@php($sum = $sum + $total)
									@php ($totalAmount = $sum + $ship)
									@endforeach
								</tbody>
							</table>
						</div>
						<div class="row">
						 <div class="col-lg-4 col-sm-5"  id="invoicefont"><br><br><br><h5>Thank You For Your Order :)</h5></div> 
						<div class="col-lg-3 col-sm-4 ml-auto " style="margin-left: 1000px;"  id="invoicefont">
							<table class="table table-clear" >
								<tbody>

									@if($payment -> payment_type == 'Cash_on_Delivery')
									<tr >
										<td  id="invoicefont"><strong> Shipping Fee : 50</strong></td>
									</tr>
									<tr>
										<td  id="invoicefont"><strong>Total Amount: {{$totalAmount}} </strong> </td>
									</tr>

									@else
									<tr>
										<td  id="invoicefont"><strong>Total Amount: {{$sum}} </strong> </td>
									</tr>

									@endif
								</tbody>
							</table>

						<!--	<div class="pull-right">
							  <a class="btn btn-sm btn-success" href="#" data-abc="true"><i class="fa fa-paper-plane mr-1"></i> Proceed to payment
							  </a>
							</div> -->

						</div>
						</div>
						</div>
						</div>
				  </div>
			 </div>
		</div>
	    <br>
	    <br>
	</body>
	</html>

@endsection

