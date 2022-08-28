@extends('User.master')
@section('title')

   View Order

@endsection
@section('content')

<style>
    #example1{
      font-family: arial ,helvetica, sans-serif;
      border-collapse: collapse;
      width: 50%;


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
      background-color: #dc413a;
      color:white;
    } 
</style> 
<h3 style="text-align: center; margin-top: 30px; margin-bottom: 20px;" >View Order</h3> 

<!-- Note if order cannot be cancellled -->

<center>
<table id="example1" class="table table-bordered table-striped">        
  <thead>
    <tr>
      <th style="text-align: center;">Cancel Order</th>
      <th style="text-align: center;">Customer Name</th>
      <th style="text-align: center;">Order Price Total</th>
      <th style="text-align: center;">Order Status</th>
      <th style="text-align: center;">Order Date</th>
      <th style="text-align: center;">Action</th>
    </tr>
  </thead>

  <tbody>
   
    @php($i = 1)
    @foreach($orders  as $order)
    @if($order -> user_id == Auth::user()->id)
   	 
  	<tr>

  		 <td>
         cancel
        </td>

  			 		
  	     <td style="text-align: center; color: 	black;">{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>
  	     <td style="text-align: center; color: 	black;">{{$order->order_total}}</td>

  	     <td style="text-align: center; color: 	black;">{{$order->order_status}} </td>
  	     <td style="text-align: center; color: 	black;">{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString()}}</td>
  	     <td> 

  	     	<!-- modal --> 	
          <!-- modal represents the order details of the customer -->
  				<div class="modal video-modal fade" id="myModal1{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal1">
  					<div class="modal-dialog" role="document">
  							<div class="modal-content">
  								<div class="modal-header">
  									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
  								</div>
  								<section>
  									<div class="modal-body">
  									    <h3 style="text-align: center; font-family: Arial sans-serif; margin-bottom: 20px; color: black;">Order Details </h3>
  									    <table class="table table-bordered table-striped">        
  							              <thead>
  							                <tr>						                  								               
          												<th style="text-align: center;">Item</th>
          												<th style="text-align: center;">Quantity</th>
          												<th style="text-align: center;">Price</th>
          												<th style="text-align: center;">Total</th>								
  							                </tr>
  							              </thead>
  							              <tbody>
                              
                             
                      
  							              	<tr> 		
  							              		<td style="text-align: center; color: black;">{{$order -> dish_name}}</td>
  							             		  <td style="text-align: center; color: black;">{{$order -> dish_qty}}</td>
  							              		<td style="text-align: center; color: black;">{{$order -> dish_price}}</td>
  											         	<td style="text-align: center; color:black;">{{$total = $order -> dish_price * $order -> dish_qty}}</td>						        	
  							              	</tr>				
                              
                              
          
  							              </tbody>
  							            </table>
  										<div class="clearfix"> </div>
  									</div>
  								</section>
  							</div>
  					</div>
  				</div> 
      		<!-- end of modal -->

       	  <a class="btn" data-toggle="modal" data-target="#myModal1{{$order->id}}" style="text-decoration: none; color: green;">
			       <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Order Details
		      </a> 

		 </td>     
    
  	</tr>	
  @endif
  @endforeach
  	 	

  </tbody>
</table>

 <!-- View Order modal -->
  		
   <!-- View order Modal -->
</center>
  
  	


@endsection
