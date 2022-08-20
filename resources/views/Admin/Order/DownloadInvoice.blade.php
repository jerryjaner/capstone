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
					 #example1{

				        font-family: arial ,helvetica, sans-serif;
				        border-collapse: collapse;
				        width: 100%;
				        margin-top: 50px;

				     }
			         #example1 td, #example1 th {

						border: 1px solid #ddd;
						padding: 8px;
				    }
				    #example1 tr:nth-child(even){

				        background-color: #ddd;
				    }

				    #example1 th{
				      padding-top: 12px;
				      padding-bottom: 12px;
				      text-align: left;
				      background-color: green;
				      color:white;

				    }
				    #footer{
				    	margin-top: 75px;
				    	text-align: center;
				    }
											

		</style>
	</head>
	<body>
		<div class="container-fluid mt-100 mb-100">
			<div id="ui-view">
				<div class="card">
					<div class="card-header"> 
						@foreach($OrderD as $orderD)
						<h3 style="float: right; margin-left: 50px;"> Invoice # <strong>{{$orderD -> order_id}}</strong></h3> 
						@endforeach
						<div class="pull-right">
						<!--  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-print mr-1"></i> Print</a>
						  <a class="btn btn-sm btn-info" href="#" data-abc="true"><i class="fa fa-file-text-o mr-1"></i> Save</a> -->
						</div>
					</div>
					<div class="card-body">
						<div class="row mb-4">
							<div class="col-sm-4">
								<h5 class="mb-3"> <strong>From:</strong> </h5>
								<div>Name: <strong> Nicks Resto Bar & Cafe Restaurant</strong></div>
								<div>Address: Gadgaron Matnog Sorsogon</div>
								<div>Email: Nicks@gmail.com</div>
								<div>Phone: 09706677438</div>
							</div>
							<hr>

							<div class="col-sm-4">
								<h5 class="mb-3"><strong>To:</strong></h5>
								<div>Name:<strong>{{$customer -> name}} {{$customer -> middlename}} {{$customer -> lastname}}</strong></div>
							    <div>Address: {{$shipping -> address}}</div>
								<div>Email: {{$customer -> email}}</div>
								<div>Phone: {{$shipping -> phone_no}}</div>
							</div>
							<hr>
							<div class="col-sm-4">
								<h5 class="mb-3"><strong>Details:</strong></h5>
								<div>Payment :<strong> {{$payment -> payment_type}}</strong></div>
								<div>Date: {{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</div>
							</div>
							<hr>
					</div>

							<div class="table-responsive-sm">
								 <table id="example1">
					                  <thead>
					                    <tr>
					                      <th class="center" style="text-align: center;">#</th>
										  <th style="text-align: center;">Item</th>
										  <th class="center" style="text-align: center;">Quantity</th>
										  <th class="right" style="text-align: center;">Price</th>
										  <th class="right" style="text-align: center;">Total</th>
					                    </tr>
					                  </thead>
					                <tbody>	                    				                  
					                    @php($i = 1)
										@php($sum = 0)
										@php($ship = 1)
										@foreach($OrderD as $orderdetail)

					                  <tr>
										<td class="center" style="text-align: center;">{{$i++}}</td>
										<td class="left" style="text-align: center;">{{$orderdetail -> dish_name}}</td>	
										<td class="center" style="text-align: center;">{{$orderdetail -> dish_qty}}</td>
										<td class="right" style="text-align: center;">{{$orderdetail -> dish_price}}</td>
										<td class="right" style="text-align: center;">{{$total = $orderdetail -> dish_price * $orderdetail -> dish_qty}}</td>
									 </tr>

									    @php($sum = $sum + $total)
										@php ($totalAmount = $sum + $ship)
										@if($payment -> payment_type == 'Cash_on_Delivery')
										
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td style="text-align: center;">Shipping Fee :<strong>1</strong><br>
												   Total Amount: <strong> {{$totalAmount}}</strong>
											</td>										
										</tr>
										@else
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td class="right" style="text-align: center;"><strong>Total Amount: {{$sum}} </strong> </td>
										</tr>

										@endif


										@endforeach
									</tbody>
								</table>            
							</div>

							<div class="row" id="footer">
							  <div><h3>Thank You For Your Order :)</h3></div>
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



