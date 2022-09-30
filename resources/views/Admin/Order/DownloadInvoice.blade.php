{{-- 	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<style>
			@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

					body {
					
					    font-family: 'Calibri', sans-serif !important;
					}


					.mt-100{
					  margin-top: 10px;
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
								
						<img src="{{public_path('BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="border-radius: 50%; width: 100px; margin-left: 20%;">
						
					</div>
					<div class="card-body">
						<div class="row mb-4"> 

							<div class="col-sm-4">
								<h3 style="float: right; margin-left: 50px;"> Invoice # {{$order -> id}}</h3> <br>
								<h5 class="mb-3"> <strong>From:</strong> </h5>
								<div>Name: <strong> Nicks Resto Bar & Cafe Restaurant</strong></div>
								<div>Address: Gadgaron Matnog Sorsogon</div>
								<div>Email: Nicks@gmail.com</div>
								<div>Phone: 09706677438</div>
							</div>
							<hr>

							<div class="col-sm-4">
								<h5 class="mb-3"><strong>To:</strong></h5>
								<div>Name:<strong>{{$shipping -> name}}</strong></div>
							    <div>Address: {{$shipping -> address}}</div>
								<div>Email: {{$customer -> email}}</div>
								<div>Phone: {{$shipping -> phone_no}}</div>
							</div>
							<hr>
							<div class="col-sm-4">
								<h5 class="mb-3"><strong>Details:</strong></h5>
								<div>Payment :
										@if($payment -> payment_type == 'Cash_on_Delivery')

										   <strong> Cash On Delivery </strong>

										@elseif($payment -> payment_type == 'Cash_on_Pickup')

										   <strong> Cash On Pickup </strong>
										   
										@endif
								</div>
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
										@php($ship = 50)
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


									@endforeach

										@if($payment -> payment_type == 'Cash_on_Delivery')
										
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>Shipping Fee :<strong>50</strong><br>
												Total Amount :<strong>{{$totalAmount}}</strong>
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






 --}}

 <!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Invoice Example</title>
      
  		<style type="text/css">
        	.invoice-box {
			    max-width: 1000px;
			    margin: auto;
			    padding: 30px;
			    border: 1px solid #eee;
			    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
			    font-size: 16px;
			    line-height: 24px;
			    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			    color: #555;
			}

			.invoice-box table {
			    width: 100%;
			    line-height: inherit;
			    text-align: left;
			}

			.invoice-box table td {
			    padding: 5px;
			    vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
			    text-align: right;
			}

			.invoice-box table tr.top table td {
			    padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
			    font-size: 45px;
			    line-height: 45px;
			    color: #333;
			}

			.invoice-box table tr.information table td {
			    padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
			    background: #eee;
			    border-bottom: 1px solid #ddd;
			    font-weight: bold;
			}

			.invoice-box table tr.details td {
			    padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
			    border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
			    border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
			    border-top: 2px solid #eee;
			    font-weight: bold;
			}
			#example1{

		        font-family: arial ,helvetica, sans-serif;
		        border-collapse: collapse;
		        width: 100%;
		       /* margin-top: 50px;*/

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
		      background-color: #E74844;
		      color:white;

		    }

			@media only screen and (max-width: 600px) {
			    .invoice-box table tr.top table td {
			        width: 100%;
			        display: block;
			        text-align: center;
			    }

			    .invoice-box table tr.information table td {
			        width: 100%;
			        display: block;
			        text-align: center;
			    }
			}

			/** RTL **/
			.invoice-box.rtl {
			    direction: rtl;
			    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
			    text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
			    text-align: left;
			}
        </style>
    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="{{public_path('BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" style="border-radius: 50%; width: 90px;">
                                </td>
                                <td>
                                    Invoice #: <strong>{{$order -> id}}</strong> <br/>
                                    Order Date: <strong>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</strong>    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>From:<br />
                                    <strong> Nicks Resto Bar & Cafe Restaurant</strong>.<br />
                                    Gadgaron Matnog Sorsogon<br/>
                                    Nicks_Resto@gmail.com<br/>
                                    09706677438
                                </td>
                                <td>To:<br/>
                                    <strong>{{$shipping -> name}}</strong><<br />
                                    {{$shipping -> address}}<br/>
                                    {{$shipping -> email}}<br/>
                                    {{$shipping -> phone_no}}<br/>
                                    @if($payment -> payment_type == 'Cash_on_Delivery')

									   <strong> Cash On Delivery </strong>

									@elseif($payment -> payment_type == 'Cash_on_Pickup')

									   <strong> Cash On Pickup </strong>
									   
									@endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

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
					@php($ship = 50)
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


				@endforeach

					@if($payment -> payment_type == 'Cash_on_Delivery')
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Shipping Fee :<strong> 50</strong><br>
							Total Amount :<strong> {{$totalAmount}}</strong>
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

				</tbody>
			</table>   
{{-- for the footer of the invoice --}}

        </div>
    </body>
</html>